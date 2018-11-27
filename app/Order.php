<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    public function orderdetails()
    {
        return $this->hasMany('App\Orderdetail', 'order_id', 'id');
    }
}
