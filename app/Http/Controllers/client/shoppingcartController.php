<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class shoppingcartController extends Controller
{
    public function getShoppingCart(Request $req)
    {
        $data = $req->session()->get('this_customer');
        $customer_ID = $data[0]->Customer_ID;

        $customer = DB::table('users')
            ->join('carts', 'users.id', '=', 'carts.Customer_ID')
            ->join('product_details', 'carts.Product_Detail_ID', '=', 'product_details.ID')
            ->join('Products', 'Products.ID', '=', 'product_details.Product_ID')
            ->where('users.Id', $customer_ID)->get();

        // $count_cart = count($customer);
        // session()->put('count_products', $count_cart);


        return view('clientsPage.shoppingCart', ['this_customer' => $customer]);
    }

    // public function setProductQuantity(Request $req)
    // {
    //     $Slug = $req->Slug;
    //     $this_product = DB::table('Products')->join('Product_details', 'Products.ID', '=', 'product_details.Product_ID')->where('product_details.Slug', $Slug)->get();

    //     dd($this_product);
    // }
    // public function getSmallShoppingCart(Request $req)
    // {
    //     $data = $req->session()->get('this_customer');
    //     $customer_ID = $data[0]->Customer_ID;
    //     $customer = DB::table('users')->join('carts', 'users.id', '=', 'carts.Customer_ID')->join('product_details', 'carts.Product_Detail_ID', '=', 'product_details.ID')->join('Products', 'Products.ID', '=', 'product_details.Product_ID')->where('users.Id', $customer_ID)->get();
    //     return view('layouts.header', ['this_customer' => $customer]);
    // }

    // public function addToCart(Request $req){
    //     dd('fasd');

    //     $data = $req->session()->get('this_customer');
    //     $customer_ID = $data[0]->Customer_ID;

    //     $Slug = $req->Slug;
    //     $this_product = DB::table('Products')->join('Product_details', 'Products.ID', '=', 'product_details.Product_ID')->where('product_details.Slug',$Slug)->get();

    //     dd($this_product);
    // }


}
