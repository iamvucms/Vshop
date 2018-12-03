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
Route::get('product/{slug}-{id}.html','ProductController@productDetails')->where([
    'slug'=>'[a-zA-Z-0-9--]+',
    'id'=>'[0-9]+'
    ]);
    Route::get('category/{slug?}', ['uses'=>'CategoriesController@products'])->where(['slug'=>'[a-zA-Z--]+'])->name('category');
    // Route::get('x', function () {
    //     dd(App\Product::where('product_id',1)->first()->discount);
    // });

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::group(['prefix' => 'members'], function () {
    Route::get('login',['uses'=>'User\LoginController@getLogin'])->middleware('guest')->name('login');
    Route::post('login',['uses'=>'User\LoginController@postLogin'])->middleware('guest')->name('postLogin');
    Route::get('logout',['uses'=>'User\LogoutController@Logout'])->name('logout');
});
Route::get('shopping_cart',function(){
    return view('layout.cart');
})->name('shopping_cart');
Route::get('cart',function(){
    $cart = new App\Cart;
    //$cart->addItem(1,10);
    dd(Session::get('cart'));
});
