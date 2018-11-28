<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = "discounts";
    public function product()   
    {
        return $this->belongsTo('App\Products=', 'product_id', 'product_id');
    //     ->where(
    //         'UNIX_TIMESTAMP(now())-UNIX_TIMESTAMP(discounts.created_at)','<','expired_time'
    //    );
    }
}
