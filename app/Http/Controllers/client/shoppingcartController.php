<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class shoppingcartController extends Controller
{
    public function getShoppingCart()
    {
        return view('clientsPage.shippingCart');
    } 
}
