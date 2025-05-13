<?php
namespace App\Repositories;

use App\Models\Order;

class OrderRepository{

    public function save($order){
        $order->save();
        return $order;
    }

    public function find($id){
        return Order::find($id);
    }
    
    public function findWithDelivery($id){
        return Order::with('delivery')->find($id);
    }
}