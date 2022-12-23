<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Brand;
use PDF;
use App\Models\Wishlist;


class wishListController extends Controller
{
    public function getWithList(Request $req)
    {
        $customer_ID = Auth::guard('users')->id();
        $this_customer = User::where('id', $customer_ID)->get();
        $customer_ID = $this_customer[0]->id;


        $carts = Cart::where('Customer_ID', $customer_ID)->get();
        session()->put('cart_quantity', count($carts));

        $cart_quantity = session()->get('cart_quantity');

        $wish_list= Wishlist::where('Customer_ID', $customer_ID)->get();

        $Product_Details_ID = [];
        foreach ($wish_list as $item) {
            array_push($Product_Details_ID, $item->Product_Detail_ID);
        };

        $product_Details_Slug = [];
        foreach ($Product_Details_ID as $item) {
            $Slug =  ProductDetail::where('product_details.ID', $item)
                ->join('Products', 'Products.id', '=', 'product_details.Product_ID')
                ->get('product_details.Slug');
            foreach ($Slug as $kk) {
                array_push($product_Details_Slug, $kk);
            }
        }

        $specific_item_slug = [];
        foreach ($product_Details_Slug as $item) {
            array_push($specific_item_slug, $item->Slug);
        }

        $all_cart_products = [];
        foreach ($specific_item_slug as $item) {
            $pro = DB::table('categories')
            ->join('Products', 'Products.category_ID', '=', 'categories.ID')
            ->join('product_details', 'Product_Details.Product_ID', '=','Products.ID')
            ->where('product_details.Slug',$item)
            ->get();
            
            
            // where('product_details.Slug', $item)
            //     ->join('Products', 'Products.id', '=', 'product_details.Product_ID')
            //     ->join('categories', 'categories.ID', '=', 'Products.Category_ID')
            //     ->get();
            array_push($all_cart_products, $pro);
        }

        $allPro = [];
        foreach ($all_cart_products as $item) {
            array_push($allPro, $item[0]);
        }

        dd($allPro);

        return view('clientsPage.wishList', ['cart_quantity' => $cart_quantity,'this_customer'=>$allPro]);
    }
}
