<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['delivery_id','order_date', 'pizzas_ids'];

    public function delivery(){
        return $this->belongsTo(Delivery::class);
    }

}
