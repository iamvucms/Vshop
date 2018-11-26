<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{   
    public function renderIndex(){
        $title = 'Electronic Shopping';
        return view('index',compact("title"));
    }
}
