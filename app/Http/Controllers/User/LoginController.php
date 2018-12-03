<?php

namespace App\Http\Controllers\User;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    
    public function getLogin(){
        return view('auth.login');
    }
    public function postLogin(Request $req){
        $req->only('email','password','remember');
        $validator = Validator::make($req->all(), [
            'email'=>'email|required',
            'password'=>'min:6|required'
        ]);
        if($validator->fails()){
            $errors = $validator->errors()->all();
            
            return redirect()->back()->with("errors",$errors);
        }else{
            if(Auth::attempt(['email' => $req->email, 'password' => $req->password],$req->remeber)){
                return redirect()->route('dashboard');
            }else{
                return redirect()->back()->withErrors('errorLoginInformation','Email and password are not found in ours systems');
            }
            
        }
    }
}
