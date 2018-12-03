<?php

namespace App;
use Session;
use Illuminate\Database\Eloquent\Model;
use App\Product;
class Cart extends Model
{
    private $cart;
    function __construct(){
      //dd(Session::get('cart'));
        $this->cart = Session::has('cart')  ? Session::get('cart') : [];
        echo   Session::has('cart') ;
      //dd(Session::get('cart'));
    }
    public function addItem($product_id,$quantity){
        $product =Product::where('product_id',$product_id);
        $exists = $this->is_exists($product_id);
        if($product->count()>0 && $quantity >0 && $exists["has"]){
           $this->cart[$exists["key"]]["quantity"] += $quantity;
        }
        elseif($product->count()>0 && $quantity >0 && !$exists["has"]){
            $this->cart[]=[
                'product_id'=> $product_id,
                'quantity'=>$quantity,
                'price' => $product->first()->price
            ];
        }
        Session::put('cart',$this->cart);
        $this->__construct();
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
            Session::put('cart',$this->cart);
            $this->__construct();
    }
    public function delItem($product_id){
         foreach ($this->cart as $key => $item) {
             if(@$value['product_id']==$product_id){
                 unset($this->cart[$key]);
                 break;
             }
         }
         Session::put('cart',$this->cart);
         $this->__construct();
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
}
