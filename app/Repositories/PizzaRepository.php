<?php
namespace App\Repositories;

use App\Models\Pizza;

class PizzaRepository{

    public function find($id){
        return Pizza::find($id);
    }
}