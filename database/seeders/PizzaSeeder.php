<?php

namespace Database\Seeders;

use App\Models\Pizza;
use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pizza = new Pizza();
        $pizza->name = 'Margarita';
        $pizza->price = 10.00;
        $pizza->save();
    }
}
