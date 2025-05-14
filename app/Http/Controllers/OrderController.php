<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Helpers\ApiResponse;
use App\Http\Requests\CreateOrderRequest;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

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

    public function calculateTotal($id){

        $total = $this->orderService->calculateTotal($id);
        return ApiResponse::success($total, "Successfully");

    }

    public function find($id){
        $order = $this->orderService->find($id);
        return ApiResponse::success($order, "Successfully");
    }

    public function update(Request $request){

        //Validamos el status introducido, esto se podria hacer
        // con una request personalizada igual que hacemos en el create.
        $request->validate([
            'new_status' => [new Enum(StatusEnum::class)],
        ]);

        $order = $this->orderService->update($request->all());
        return ApiResponse::success($order, "Update status successfully");

        
    }
}
