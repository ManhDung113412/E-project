<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\client\test;
use Illuminate\Support\Facades\DB;

class homepageController extends Controller
{
    public function getHomePage()
    {
        $middle_slides_img = DB::table('sliedes')->where('Is_Top_Slide', 0)->where('Is_Middle_Slide', 1)->get();
        $top_slides_img = DB::table('sliedes')->where('Is_Top_Slide', 1)->where('Is_Middle_Slide', 0)->get();
        $products = DB::table('product_details')->join('products', 'Products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $p = $products->take(4);
        
        $dior = DB::table('brand_collections')->where('Brand_ID', 2)->get();
        $chanel = DB::table('brand_collections')->where('Brand_ID', 1)->get();
        $Gucci = DB::table('brand_collections')->where('Brand_ID', 3)->get();
        $LV = DB::table('brand_collections')->where('Brand_ID', 4)->get();
        
        $trending = DB::table('product_details')->join('products','products.ID','=','product_details.Product_ID')->where('product_details.Is_Trending', 1)->groupBy('Product_details.Product_ID')->get()->shuffle();
        // $dior = DB::table('brands')->join('products', 'Products.Brand_ID', '=', 'Brands.ID')->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')->where('Products.Brand_ID', 2)->paginate(13);
        $trendings = DB::table('products')->join('product_details','products.ID','=','product_details.Product_ID')->where('product_details.Is_Trending', 1)->groupBy('Product_details.Product_ID')->get()->shuffle();
        
        $tren = $trendings->take(4);
        // dd($tren);

        // dd($tren);
        // dd($p);

        return view('clientsPage.homePage', ['middle_slides_img' => $middle_slides_img, 'top_slides_img' => $top_slides_img, 'randomPro' => $p, 'dior' => $dior, 'channel' => $chanel, 'LV' => $LV, 'gucci' => $Gucci, 'trending' => $tren]);
    }
}
