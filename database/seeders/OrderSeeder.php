<?php

namespace Database\Seeders;

use App\Enums\StatusEnum;
use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $order = new Order();
        $order->status = StatusEnum::CREATED;
        $order->order_date='2025-01-01';
        $order->pizzas_ids= "1,2";
        $order->delivery_id = 2;
        $order->save();

        $order = new Order();
        $order->status = StatusEnum::CREATED;
        $order->order_date='2025-03-03';
        $order->pizzas_ids= "1,2";
        $order->delivery_id = 1;
        $order->save();


    }
}
