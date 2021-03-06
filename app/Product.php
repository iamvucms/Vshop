<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    public function Category()
    {
        return $this->belongsTo('App\Category', 'cat_id', 'cat_id');
    }
    public function reviews()
    {
        return $this->belongsTo('App\Review', 'product_id', 'product_id');
    }
    //not necessary
    public function orderdetails()
    {
        return $this->hasMany('App\Orderdetail', 'product_id', 'product_id');
    }
    public function images()
    {
        return $this->hasMany('App\Image', 'product_id', 'product_id');
    }
    public function discount()
    {
        return $this->hasOne('App\Discount', 'product_id', 'product_id')->whereRaw(
            'UNIX_TIMESTAMP(now())-UNIX_TIMESTAMP(discounts.created_at)<expired_time'
        );
    }
    
}
