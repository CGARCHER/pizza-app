<?php
namespace App\Services;

use App\Enums\StatusEnum;
use App\Models\Order;
use App\Repositories\OrderRepository;

class OrderService{

    private OrderRepository $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function create($params){
        $order = new Order();
        $order->status = StatusEnum::CREATED;
        $order->fill($params);
        return $this->orderRepository->save($order);
    }
}