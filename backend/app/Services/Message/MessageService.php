<?php

namespace App\Services\Message;

use App\Models\Message;
use App\Models\Ticket;
use App\Models\User;

class MessageService
{
    public function createMessage(Ticket $ticket, User $user, array $data): Message
    {
        $message = new Message([
            'message' => $data['message'],
        ]);

        $message->user()->associate($user);
        $message->ticket()->associate($ticket);
        $message->save();

        return $message;
    }
}
