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
        $longWallet = DB::table('categories')->join('products', 'Products.Category_ID', '=', 'categories.ID')->where('Products.Category_ID', 3)->paginate(13);
        return view('layouts.longWallet', ['longWallet' => $longWallet]);
    }
    public function getSmallWallet()
    {
        $smallWallet = DB::table('categories')->join('products', 'Products.Category_ID', '=', 'categories.ID')->where('Products.Category_ID', 4)->paginate(13);
        // dd($smallWallet);
        return view('layouts.smallWallet', ['smallWallet' => $smallWallet]);
    }
    public function getCardsHolder()
    {
        $cardHolder = DB::table('categories')->join('products', 'Products.Category_ID', '=', 'categories.ID')->where('Products.Category_ID', 1)->paginate(13);
        //   dd($cardHolder);
        return view('layouts.cardsHolder', ['cardsHolder' => $cardHolder]);
    }
    public function getchainandStrap()
    {
        $chainAndStrap = DB::table('categories')->join('products', 'Products.Category_ID', '=', 'categories.ID')->where('Products.Category_ID', 2)->paginate(13);
        return view('layouts.chainsandStrap', ['chainAndStrap' => $chainAndStrap]);
    }

    public function getGucci()
    {
        $gucci = DB::table('brands')->join('products', 'Products.Brand_ID', '=', 'Brands.ID')->where('Products.Brand_ID', 4)->paginate(13);
        return view('layouts.gucci', ['gucci' => $gucci]);
    }
    public function getLouisVuiton()
    {
        $louisVuiton = DB::table('brands')->join('products', 'Products.Brand_ID', '=', 'Brands.ID')->where('Products.Brand_ID', 3)->paginate(13);
        return view('layouts.louisVuiton', ['louisVuiton' => $louisVuiton]);
    }
    public function getChannel()
    {
        $channel = DB::table('brands')->join('products', 'Products.Brand_ID', '=', 'Brands.ID')->where('Products.Brand_ID', 1)->paginate(13);
        return view('layouts.Channel', ['Channel' => $channel]);
    }
    public function getDior()
    {
        $dior = DB::table('brands')->join('products', 'Products.Brand_ID', '=', 'Brands.ID')->where('Products.Brand_ID', 2)->paginate(13);
        return view('layouts.dior', ['dior' => $dior]);
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
