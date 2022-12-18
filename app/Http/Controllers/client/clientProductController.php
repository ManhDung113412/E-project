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
        return view('layouts.longWallet');
    }
    public function getSmallWallet()
    {
        $smallWallet = DB::table('categories')->join('products', 'Products.Category_ID','=','categories.ID')->where('Products.Category_ID',4)->paginate(13);
        // dd($smallWallet);
        return view('layouts.smallWallet',['smallWallet' => $smallWallet]);
    }
    public function getCardsHolder()
    {
        return view('layouts.cardsHolder');
    }
    public function getchainandStrap()
    {
        return view('layouts.chainsandStrap');
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
    public function getGucci()
    {
        return view('layouts.gucci');
    }
    public function getLouisVuiton()
    {
        return view('layouts.louisVuiton');
    }
    public function getChannel()
    {
        return view('layouts.Channel');
    }
    public function getDior()
    {
        return view('layouts.dior');
    }
}
