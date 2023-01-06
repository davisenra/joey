<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tickets = Ticket::factory(20)->make();
        $users = User::all();

        foreach ($tickets as $ticket) {
            $user = $users->random();
            $user->tickets()->save($ticket);
        }
    }
}
