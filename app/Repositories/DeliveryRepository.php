<?php
namespace App\Repositories;

use App\Models\Delivery;

class DeliveryRepository{

    public function find($id){
        return Delivery::find($id);
    }
}