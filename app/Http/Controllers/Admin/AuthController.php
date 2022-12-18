<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(){
        return view('admin.auth.register');
    }

    public function checkRegister(Request $request){
        $this->validate($request,
        [
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
            'password_confirm' => 'same:password',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.auth.login')->with('success', 'Registered Successfully');
    }

    public function login(){
        return view('admin.auth.login');
    }

    public function checkLogin(Request $request){
        $this->validate($request,
        [
            'email_address' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt(['email_address' => $request->email, 'password' => $request->password])){
            return  redirect()->route('admin.brand.index');
        }

        return redirect()->route('admin.auth.login')->with('error', 'Your Email or Password is invalid!');
    }
}
