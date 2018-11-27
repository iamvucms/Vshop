<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    protected $table = "shippers";
    public function orders()
    {
        return $this->hasMany('App\Order', 'ship_id', 'ship_id');
    }
}
