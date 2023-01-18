<?php

declare(strict_types=1);

namespace App\Services\Ticket;

use App\Models\Category;
use App\Models\Label;
use App\Models\Ticket;
use App\Models\User;

class TicketService
{
    public function createTicket(User $user, array $data): Ticket
    {
        $ticket = new Ticket([
            'title' => $data['title'],
            'description' => $data['description'],
            'priority' => $data['priority'],
        ]);

        $user->tickets()->save($ticket);

        if (! empty($categories = $data['categories'])) {
            $categoriesIds = array_map(
                fn ($category) => Category::where('name', $category)->first()->id,
                $categories
            );

            $ticket->categories()->sync($categoriesIds);
        }

        if (! empty($labels = $data['labels'])) {
            $labelsIds = array_map(
                fn ($label) => Label::where('name', $label)->first()->id,
                $labels
            );

            $ticket->labels()->sync($labelsIds);
        }

        if (isset($data['images'])) {
            $ticket->addMultipleMediaFromRequest(['images'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('screenshots');
                });
        }

        return $ticket;
    }

    public function updateTicket(Ticket $ticket, array $data): bool
    {
        return $ticket->update($data);
    }

    public function deleteTicket(Ticket $ticket): ?bool
    {
        $ticket->categories()->detach();
        $ticket->labels()->detach();

        return $ticket->delete();
    }

    public function assignTicketToAgent(Ticket $ticket, User $user): bool
    {
        return $this->updateTicket($ticket, ['assigned_agent' => $user->id]);
    }

    public function lockTicket(Ticket $ticket): bool
    {
        return $this->updateTicket($ticket, ['is_locked' => true]);
    }
}
