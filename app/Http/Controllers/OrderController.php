<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\CreateOrderRequest;
use App\Services\OrderService;

class OrderController extends Controller
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function create(CreateOrderRequest $create_order_request){

        $params = $create_order_request->all();
        $order = $this->orderService->create($params);
        return ApiResponse::success($order, "Order created");



    }
}
