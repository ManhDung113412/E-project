<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class clientProductController extends Controller
{
    public function getProductPages()
    {
        return view('layouts.productPage');
    }
    public function getLongWallet()
    {
        $products = DB::table('products')->get()->shuffle();
        $ran_pro = [];
        array_push($ran_pro, $products[0], $products[1], $products[2], $products[3]);
        $longWallet = DB::table('categories')->join('products', 'Products.Category_ID', '=', 'categories.ID')->where('Products.Category_ID', 3)->paginate(13);
        return view('layouts.longWallet', ['longWallet' => $longWallet,'randomProduct' => $ran_pro]);
    }
    public function getSmallWallet()
    {
        $products = DB::table('products')->get()->shuffle();
        $ran_pro = [];
        array_push($ran_pro, $products[0], $products[1], $products[2], $products[3]);
        $smallWallet = DB::table('categories')->join('products', 'Products.Category_ID', '=', 'categories.ID')->where('Products.Category_ID', 4)->paginate(13);
        // dd($smallWallet);
        return view('layouts.smallWallet', ['smallWallet' => $smallWallet,'randomProduct' => $ran_pro]);
    }
    public function getCardsHolder()
    {
        $products = DB::table('products')->get()->shuffle();
        $ran_pro = [];
        array_push($ran_pro, $products[0], $products[1], $products[2], $products[3]);
        $cardHolder = DB::table('categories')->join('products', 'Products.Category_ID', '=', 'categories.ID')->where('Products.Category_ID', 1)->paginate(13);
        //   dd($cardHolder);
        return view('layouts.cardsHolder', ['cardsHolder' => $cardHolder,'randomProduct'=>$ran_pro]);
    }
    public function getchainandStrap()
    {
        $products = DB::table('products')->get()->shuffle();
        $ran_pro = [];
        array_push($ran_pro, $products[0], $products[1], $products[2], $products[3]);
        $chainAndStrap = DB::table('categories')->join('products', 'Products.Category_ID', '=', 'categories.ID')->where('Products.Category_ID', 2)->paginate(13);
        return view('layouts.chainsandStrap', ['chainAndStrap' => $chainAndStrap,'randomProduct' => $ran_pro]);
    }

    public function getGucci()
    {
        $products = DB::table('products')->get()->shuffle();
        $ran_pro = [];
        array_push($ran_pro, $products[0], $products[1], $products[2], $products[3]);
        $gucci = DB::table('brands')->join('products', 'Products.Brand_ID', '=', 'Brands.ID')->where('Products.Brand_ID', 4)->paginate(13);
        return view('layouts.gucci', ['gucci' => $gucci,'randomProduct' => $ran_pro]);
    }
    public function getLouisVuiton()
    {
        $products = DB::table('products')->get()->shuffle();
        $ran_pro = [];
        array_push($ran_pro, $products[0], $products[1], $products[2], $products[3]);
        $louisVuiton = DB::table('brands')->join('products', 'Products.Brand_ID', '=', 'Brands.ID')->where('Products.Brand_ID', 3)->paginate(13);
        return view('layouts.louisVuiton', ['louisVuiton' => $louisVuiton,'randomProduct' => $ran_pro]);
    }
    public function getChannel()
    {
        $products = DB::table('products')->get()->shuffle();
        $ran_pro = [];
        array_push($ran_pro, $products[0], $products[1], $products[2], $products[3]);
        $channel = DB::table('brands')->join('products', 'Products.Brand_ID', '=', 'Brands.ID')->where('Products.Brand_ID', 1)->paginate(13);
        return view('layouts.Channel', ['Channel' => $channel,'randomProduct'=> $ran_pro]);
    }
    public function getDior()
    {
        $products = DB::table('products')->get()->shuffle();
        $ran_pro = [];
        array_push($ran_pro, $products[0], $products[1], $products[2], $products[3]);
        $dior = DB::table('brands')->join('products', 'Products.Brand_ID', '=', 'Brands.ID')->where('Products.Brand_ID', 2)->paginate(13);
        return view('layouts.dior', ['dior' => $dior,'randomProduct' => $ran_pro]);
    }

    public function getNewArrival()
    {
        return view('layouts.newArrival');
    }
    public function getTrending()
    {
        return view('layouts.trending');
    }
    public function getDiscount()
    {
        return view('layouts.discountProduct');
    }
}
