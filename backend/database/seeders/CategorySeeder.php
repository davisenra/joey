<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tickets = Ticket::all();
        $categories = Category::factory(5)->create();

        for ($i = 0; $i < 20; $i++) {
            $ticket = $tickets->random();

            try {
                $ticket->categories()->sync([
                    $categories->random()->id,
                    $ticket->id,
                ]);
            } catch (QueryException) {
                $i++;

                continue;
            }
        }
    }
}
