<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productDetails($slug,$id){
        $product= Product::where('product_id',$id)->where('slug',$slug)->first();
    
        if(!$product) abort(404);
        else{
            $title = $product->product_name;
            return view("layout.product",compact("title","product"));
        }
    }
}
