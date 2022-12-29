<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\client\test;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\User;

class homepageController extends Controller
{
    public function getHomePage()
    {
        $middle_slides_img = DB::table('sliedes')->where('Is_Top_Slide', 0)->where('Is_Middle_Slide', 1)->get();
        $top_slides_img = DB::table('sliedes')->where('Is_Top_Slide', 1)->where('Is_Middle_Slide', 0)->get();
        $products = DB::table('products')->join('product_details', 'products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $p = $products->take(4);

        $dior = DB::table('brand_collections')->where('Brand_ID', 2)->get();
        $chanel = DB::table('brand_collections')->where('Brand_ID', 1)->get();
        $Gucci = DB::table('brand_collections')->where('Brand_ID', 3)->get();
        $LV = DB::table('brand_collections')->where('Brand_ID', 4)->get();

        $trendings = DB::table('products')->join('product_details', 'products.ID', '=', 'product_details.Product_ID')->where('product_details.Is_Trending', 1)->groupBy('Product_details.Product_ID')->get()->shuffle();
        $tren = $trendings->take(4);

        $cart_quantity = session()->get('cart_quantity');

        
        $hehe_img = DB::table('sliedes')->where('Is_Top_Slide', 0)->where('Is_Middle_Slide', 1)->get()->shuffle();
        $dungdz = $hehe_img->take(1);
        
        return view('clientsPage.homePage', ['middle_slides_img' => $middle_slides_img, 'top_slides_img' => $top_slides_img, 'randomPro' => $p, 'dior' => $dior, 'channel' => $chanel, 'LV' => $LV, 'gucci' => $Gucci, 'trending' => $tren,'cart_quantity' => $cart_quantity,'dungdeptrai'=>$dungdz]);
    }

    public function subscribe(Request $req){
        $mail= $req->subscribe_email;
        return redirect()->route('client.login');
    }
}
