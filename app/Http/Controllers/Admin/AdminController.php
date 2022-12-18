<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(){
        return view('admin.login.index');
    }

    public function checkLogin(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return  redirect()->route('admin.brand.index');
        }
        return redirect()->route('admin.auth.login')->with('error', 'Your Email or Password is invalid!');
    }
}
