<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = Message::factory(30)->make();
        $users = User::all();
        $tickets = Ticket::all();

        foreach ($messages as $message) {
            $user = $users->random();
            $ticket = $tickets->random();

            $message->user()->associate($user);
            $message->ticket()->associate($ticket);
            $message->save();
        }
    }
}
