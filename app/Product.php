<?php

namespace App;

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
    
}
