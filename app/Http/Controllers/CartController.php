<?php
namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $cart;
    
    function __construct(){
        $this->cart = new Cart();
    }
    public function indexCart(){

    }
}
