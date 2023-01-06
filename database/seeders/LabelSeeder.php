<?php

namespace Database\Seeders;

use App\Models\Label;
use App\Models\Ticket;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tickets = Ticket::all();
        $labels = Label::factory(5)->create();

        for ($i = 0; $i < 20; $i++) {
            $ticket = $tickets->random();

            try {
                $ticket->labels()->sync([
                    $labels->random()->id,
                    $ticket->id,
                ]);
            } catch (QueryException) {
                $i++;
                continue;
            }
        }
    }
}
