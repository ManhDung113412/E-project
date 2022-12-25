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
        DB::enableQueryLog();
        $carts = DB::table('carts As c')
            ->join('product_details as pd', 'c.Product_Detail_ID', 'pd.ID')
            ->join('products as p', 'pd.Product_ID', 'p.ID')
            ->where('Customer_ID', $customer_ID)
            ->get();
        return view('clientsPage.shoppingCart', compact('carts'));



        // session()->put('cart_quantity',count($carts));

        // $cart_quantity = session()->get('cart_quantity');

        // dD($carts);

        // $all_cart_products=[];
        // foreach($carts as $item){
        //     $product = ProductDetail::where('ID',$item->Product_Detail_ID)->get();
        //     array_push($all_cart_products,$product);
        // }

        // foreach($all_cart_products as $item){
        //     $pro_name = Product::where('id',$item->Product_Detail_ID)->get();
        //     array_push($all_cart_products,$pro_name);
        // }
        // dd($all_cart_products);



        // $Product_Details_ID = [];
        // foreach ($carts as $item) {
        //     array_push($Product_Details_ID, $item->Product_Detail_ID);
        // };

        // $product_Details_Slug = [];
        // foreach ($Product_Details_ID as $item) {
        //     $Slug =  ProductDetail::where('product_details.ID', $item)
        //         ->join('Products', 'Products.id', '=', 'product_details.Product_ID')
        //         ->get('product_details.Slug');
        //     foreach ($Slug as $kk) {
        //         array_push($product_Details_Slug, $kk);
        //     }
        // }

        // $specific_item_slug = [];
        // foreach ($product_Details_Slug as $item) {
        //     array_push($specific_item_slug, $item->Slug);
        // }

        // $all_cart_products = [];
        // foreach ($specific_item_slug as $item) {
        //     $pro =  ProductDetail::where('product_details.Slug', $item)
        //         ->join('Products', 'Products.id', '=', 'product_details.Product_ID')
        //         ->get();
        //     array_push($all_cart_products, $pro);
        // }

        // $allPro = [];
        // foreach ($all_cart_products as $item) {
        //     array_push($allPro, $item[0]);
        // }

        // dd($this_customer[0]->id);
    }

    public function postShoppingCart(Request $request)
    {
        if ($request->get('product')) {

            $product_id = $request->get('product');
            $customer_id = Auth::guard('users')->id();
            $old_quantity = DB::table('carts')
                ->where('Customer_ID', $customer_id)
                ->where('Product_Detail_ID', $product_id)
                ->select('Product_quantity')
                ->get();
            $cart = DB::table('carts')
                ->where('Customer_ID', $customer_id)
                ->where('Product_Detail_ID', $product_id)
                ->update([
                    'Product_quantity' => $old_quantity[0]->Product_quantity + 1,
                ]);
            $new_item = DB::table('carts')
                ->where('Customer_ID', $customer_id)
                ->where('Product_Detail_ID', $product_id)
                ->get();
            $item = $new_item[0];
            $output =  '<div>' . $item->Product_quantity . '</div>';
            echo $output;
        }
    }

    public function handleDecreaseQuantity(Request $request)
    {
        if ($request->get('product')) {

            $product_id = $request->get('product');
            $customer_id = Auth::guard('users')->id();
            $old_quantity = DB::table('carts')
                ->where('Customer_ID', $customer_id)
                ->where('Product_Detail_ID', $product_id)
                ->select('Product_quantity')
                ->get();
            $cart = DB::table('carts')
                ->where('Customer_ID', $customer_id)
                ->where('Product_Detail_ID', $product_id)
                ->update([
                    'Product_quantity' => $old_quantity[0]->Product_quantity - 1,
                ]);
            $new_item = DB::table('carts')
                ->where('Customer_ID', $customer_id)
                ->where('Product_Detail_ID', $product_id)
                ->get();
            $item = $new_item[0];
            $output =  '<div>' . $item->Product_quantity . '</div>';
            echo $output;
        }
    }

    public function checkOut(Request $req)
    {
    }
}
