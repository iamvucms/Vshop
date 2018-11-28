<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productDetails(){
        return Product::where('product_id',1)->first()->product_name;
    }
}
