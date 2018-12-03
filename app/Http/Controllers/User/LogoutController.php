<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class LogoutController extends Controller
{
    public function Logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
