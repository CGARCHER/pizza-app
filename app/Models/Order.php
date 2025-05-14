<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['delivery_id','order_date', 'pizzas_ids'];
    protected $casts = ['status' => StatusEnum::class];
    
    public function delivery(){
        return $this->belongsTo(Delivery::class);
    }


}
