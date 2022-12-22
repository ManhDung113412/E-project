<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.list', compact('users'));
    }

    public function detail($id){
        $user = User::find($id);
        
        // foreach($orders as $order){
        //     echo $order->Location . "<br>";
        // }
        // dd(count($orders));
        return view('admin.user.detail', compact('user'));
    }
}
