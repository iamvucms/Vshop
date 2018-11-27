<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = "reviews";
    public function products()
    {
        return $this->hasMany('App\Product', 'product_id', 'product_id');
    }
}
