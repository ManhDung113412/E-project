<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductDetail;
use App\Models\Product;
use App\Models\User;


class shoppingcartController extends Controller
{
    public function getShoppingCart(Request $req)
    {
        $customer_ID = Auth::guard('users')->id();
        $this_customer = User::where('id', $customer_ID)->get();
        // $customer =session()->get('this_customer');
        $customer_ID = $this_customer[0]->id;
        $carts = Cart::where('Customer_ID', $customer_ID)->get();
        $Product_Details_ID = [];

        foreach ($carts as $item) {
            array_push($Product_Details_ID, $item->Product_Detail_ID);
        };

        $customer_cart = DB::table('carts')
            ->join('product_details', 'product_details.ID', '=', 'carts.Product_Detail_ID')
            ->join('Products', 'Products.ID', '=', 'product_details.Product_ID')
            ->get();

        return view('clientsPage.shoppingCart', ['this_customer' => $customer_cart]);
    }
}
