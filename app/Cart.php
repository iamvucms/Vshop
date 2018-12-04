<?php

namespace App;

use App\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    private $cart;
    function __construct(){
      //dd(session('cart'));
       $this->cart =session()->get('cart') ? session()->get('cart') : [];
        //echo   Session::has('cart') ;
      //dd(Session::get('cart'));
    }
    public function addItem($product_id,$quantity,$ckey=null){
        $product =Product::where('product_id',$product_id);
        $exists = $this->is_exists($product_id);
        if($product->count() > 0 && $quantity > 0){
            if($exists["has"]){
                if($this->checkCkey($ckey)){
                    $this->cart[$exists["key"]]["quantity"] += $quantity;
                }else{
                    echo 1111;
                }
                
            }elseif(!$exists["has"]){
                 $key = str_shuffle('abcdefghijklmnopqrstuvwxyz'.strtoupper('abcdefghijklmnopqrstuvwxyz').'0123456789');
                session()->put(['cart_key'=>$key]);
                $this->cart[]=[
                    'cart_key' => Hash::make($key),
                    'product_id'=> $product_id,
                    'quantity'=>$quantity,
                    'price' => $product->first()->price
                ];
            }       
        }
        $this->saveCart();
   //    dd(Session::get('cart'));
    }
    public function editItem($product_id,$quantity){
        
            foreach ($this->cart as $key => $item) {
                if(@$value['product_id']==$product_id){
                    if($quantity<=0){
                        unset($this->cart[$key]);
                    }else{
                        $this->cart[$key]['quantity'] = $quantity;    
                    }
                    break;
                }
            }
            $this->saveCart();
    }
    public function delItem($product_id){
         foreach ($this->cart as $key => $item) {
             if(@$value['product_id']==$product_id){
                 unset($this->cart[$key]);
                 break;
             }
         }
         $this->saveCart();
    }
    public function is_exists($product_id){
        foreach($this->cart as $key => $item){
            if($item['product_id']==$product_id) return ["has"=>true,"key"=>$key];
        }
        return ["has"=>false];
    }
    public function getCart(){
            return $this->cart;
    }
    private function saveCart(){
        session()->put(['cart'=>$this->cart]);
        $this->__construct();
    }
    private function checkCkey($hash){
        return Hash::check(session()->get('cart_key'), $hash);
    }
}
