<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['as'=>'home','uses'=>'IndexController@renderIndex']); 
Route::get('test', function () {
        $row = App\Category::where('cat_id',1)->first()->products;
      
    foreach($row as $r){
        echo $r->product_name." ";
    }
    $row = App\Product::where('product_id',1)->first()->category;
        dd($row);
});