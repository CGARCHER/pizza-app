<?php
namespace App\Repositories;

use App\Models\Order;

class OrderRepository{

    public function save($order){
        $order->save();
        return $order;
    }
}