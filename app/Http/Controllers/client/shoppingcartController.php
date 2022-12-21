<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class shoppingcartController extends Controller
{
    public function getShoppingCart(Request $req)
    {
        $customer = session()->get('this_customer');
        $customer_ID = $customer[0]->id;

        $carts = Cart::where('Customer_ID', $customer_ID)->get();
        $customer_cart = [];

        foreach ($carts as $item) {
            array_push($customer_cart, $item->Product_Detail_ID);
        };


        return view('clientsPage.shoppingCart', ['this_customer' => $customer]);
    }
}
