<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductDetail;
use DB;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Brand;
use PDF;

class compareProductController extends Controller
{
    public function getCompareProduct(Request $req)
    {
        $product_ID = $req->ID;
        
        $product = ProductDetail::where('product_details.ID', $product_ID)
            ->join('Products', 'Products.ID', '=', 'product_details.Product_ID')
            ->get();

        
        // dd($product_1_ID);
        // $product2 = ProductDetail::where('product_details.ID', 2)
        //     ->join('Products', 'Products.ID', '=', 'product_details.Product_ID')
        //     ->get();
        // return view('layouts.compare', ['product_1' => $product1[0], 'product_2' => $product2[0]]);
    }
}
