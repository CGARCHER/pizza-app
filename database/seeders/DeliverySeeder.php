<?php

namespace Database\Seeders;

use App\Models\Delivery;
use Illuminate\Database\Seeder;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $delivery = new Delivery();
        $delivery->name = 'Junior';
        $delivery->phone = '676345678';
        $delivery->save();

        $delivery = new Delivery();
        $delivery->name = 'Victor';
        $delivery->phone = '676445678';
        $delivery->save();
    }
}
