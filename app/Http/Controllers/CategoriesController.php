<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function products($slug=null){
        if($slug==null){
            $cat_data=Category::first();
        }else{
            $cat_data = Category::where('cat_slug',$slug)->first();
        }
        $title = "Category: ".$cat_data->cat_name;
        $products_list = $cat_data->products()->paginate(12);   
        return view('layout.categories',compact("title","cat_data","products_list"));
    }
}
