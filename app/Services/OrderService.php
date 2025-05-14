<?php
namespace App\Services;

use App\Enums\StatusEnum;
use App\Exceptions\NotFoundDeliveryException;
use App\Exceptions\NotFoundOrderException;
use App\Exceptions\StatusErrorOrderException;
use App\Models\Delivery;
use App\Models\Order;
use App\Repositories\DeliveryRepository;
use App\Repositories\OrderRepository;
use App\Repositories\PizzaRepository;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderService{

    private OrderRepository $orderRepository;
    private DeliveryRepository $deliveryRepository;
    private PizzaRepository $pizzaRepository;

    public function __construct(OrderRepository $orderRepository,
        DeliveryRepository $deliveryRepository,
        PizzaRepository $pizzaRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->deliveryRepository = $deliveryRepository;
        $this->pizzaRepository = $pizzaRepository;
    }

    public function create($params){
       
        $this->existDelivery($params['delivery_id']);

        $order = new Order();
        $order->status = StatusEnum::CREATED;
        $order->fill($params);
        return $this->orderRepository->save($order);
    }

    private function existDelivery($id){
        $delivery = $this->deliveryRepository->find($id);

        if(empty($delivery)){
            throw new NotFoundDeliveryException("No existe un delivery con id{$id}",Response::HTTP_NOT_FOUND);
        }
    }

    public function calculateTotal($id){
        //Recuperar order
        $order = $this->orderRepository->find($id);
        $pizza_ids = $order->pizza_ids;
        $array = explode(",",$pizza_ids);
       
        $total = 0;
        foreach ($array as $pizza) {
            $pizza = $this->pizzaRepository->find($pizza);
            $total += $pizza->price;
       }
       return $total;
    }

    public function find($id){
        $order = $this->orderRepository->findWithDelivery($id);

        if(empty($order)){
            throw new NotFoundOrderException("No existe order con id {$id}", 404);
        }
        return $order;
    }

    public function update($params){
        $id = $params['order_id'];
        $new_status = $params['new_status'];

        //Comprobar que exista el ID del pedido.
        $order = $this->orderRepository->find($id);
        if(empty($order)){
            throw new NotFoundOrderException("No existe pedido con id {$id}", 404);
        }

        //Comprobar que el estado del pedido sea diferente de IN_PREPARATION y DELIVERED
        if($order->status == StatusEnum::IN_PREPARATION || 
            $order->status == StatusEnum::DELIVERED){
                throw new StatusErrorOrderException("El pedido {$order->id} su estado es {$order->status->value}", 412);
        }

        //Tras las comprobaciones, modifico el order
        $order->status = StatusEnum::from($new_status);
        return $this->orderRepository->save($order);

    }
}