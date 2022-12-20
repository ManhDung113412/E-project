<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class shoppingcartController extends Controller
{
    public function getShoppingCart(Request $req)
    {
        $data = $req->session()->get('this_customer');

        return view('clientsPage.shoppingCart',['this_customer'=>$data]);
    } 


}
