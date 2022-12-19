<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;
use App\Models\Category;

class clientProductController extends Controller
{
    public function getProductPages()
    {
        return view('layouts.productPage');
    }
    public function getLongWallet()
    {
        $products = DB::table('product_details')->join('products', 'Products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $ran_pro = [];
        array_push($ran_pro, $products[0], $products[1], $products[2], $products[3]);
        $longWallet = DB::table('categories')->join('Products', 'Products.Category_ID', '=', 'categories.ID')->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')->where('categories.ID', 3)->groupBy('Product_details.Product_ID')->paginate(13);
        return view('layouts.longWallet', ['longWallet' => $longWallet, 'randomProduct' => $ran_pro]);
    }
    public function getSmallWallet()
    {
        $products = DB::table('product_details')->join('products', 'Products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $ran_pro = [];
        array_push($ran_pro, $products[0], $products[1], $products[2], $products[3]);
        $smallWallet = DB::table('categories')->join('Products', 'Products.Category_ID', '=', 'categories.ID')->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')->where('categories.ID', 4)->groupBy('Product_details.Product_ID')->paginate(13);
        // dd($smallWallet);
        return view('layouts.smallWallet', ['smallWallet' => $smallWallet, 'randomProduct' => $ran_pro]);
    }
    public function getCardsHolder()
    {
        $products = DB::table('product_details')->join('products', 'Products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $ran_pro = [];
        array_push($ran_pro, $products[0], $products[1], $products[2], $products[3]);
        $cardHolder =  DB::table('categories')->join('Products', 'Products.Category_ID', '=', 'categories.ID')->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')->where('categories.ID', 1)->groupBy('Product_details.Product_ID')->paginate(13);
        return view('layouts.cardsHolder', ['cardsHolder' => $cardHolder, 'randomProduct' => $ran_pro]);
    }
    public function getchainandStrap()
    {
        $products = DB::table('product_details')->join('products', 'Products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $ran_pro = [];
        array_push($ran_pro, $products[0], $products[1], $products[2], $products[3]);
        $chainAndStrap = DB::table('categories')->join('Products', 'Products.Category_ID', '=', 'categories.ID')->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')->where('categories.ID', 2)->groupBy('Product_details.Product_ID')->paginate(13);
        return view('layouts.chainsandStrap', ['chainAndStrap' => $chainAndStrap, 'randomProduct' => $ran_pro]);
    }

    public function getGucci()
    {
        $products = DB::table('product_details')->join('products', 'Products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $ran_pro = [];
        array_push($ran_pro, $products[0], $products[1], $products[2], $products[3]);
        $gucci = DB::table('brands')->join('products', 'Products.Brand_ID', '=', 'Brands.ID')->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')->where('Products.Brand_ID', 4)->groupBy('Product_details.Product_ID')->paginate(13);
        return view('layouts.gucci', ['gucci' => $gucci, 'randomProduct' => $ran_pro]);
    }
    public function getLouisVuiton()
    {
        $products = DB::table('product_details')->join('products', 'Products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $ran_pro = [];
        array_push($ran_pro, $products[0], $products[1], $products[2], $products[3]);
        $louisVuiton = DB::table('brands')->join('products', 'Products.Brand_ID', '=', 'Brands.ID')->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')->where('Products.Brand_ID', 3)->groupBy('Product_details.Product_ID')->paginate(13);
        return view('layouts.louisVuiton', ['louisVuiton' => $louisVuiton, 'randomProduct' => $ran_pro]);
    }
    public function getChannel()
    {
        $products = DB::table('product_details')->join('products', 'Products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $ran_pro = [];
        array_push($ran_pro, $products[0], $products[1], $products[2], $products[3]);
        $channel = DB::table('brands')->join('products', 'Products.Brand_ID', '=', 'Brands.ID')->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')->where('Products.Brand_ID', 1)->groupBy('Product_details.Product_ID')->paginate(13);
        return view('layouts.Channel', ['Channel' => $channel, 'randomProduct' => $ran_pro]);
    }
    public function getDior()
    {
        $products = DB::table('product_details')->join('products', 'Products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $ran_pro = [];
        array_push($ran_pro, $products[0], $products[1], $products[2], $products[3]);
        $dior = DB::table('brands')->join('products', 'Products.Brand_ID', '=', 'Brands.ID')->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')->where('Products.Brand_ID', 2)->groupBy('Product_details.Product_ID')->paginate(13);
        return view('layouts.dior', ['dior' => $dior, 'randomProduct' => $ran_pro]);
    }

    public function getNewArrival()
    {
        $products = DB::table('product_details')->join('products', 'Products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $ran_pro = [];
        array_push($ran_pro, $products[0], $products[1], $products[2], $products[3]);
        $products = DB::table('product_details')->join('products', 'Products.ID', '=', 'product_details.Product_ID')->where('product_details.Is_New_Arrivals', 1)->paginate(13);
        return view('layouts.newArrival', ['products' => $products, 'randomProduct' => $ran_pro]);
    }
    public function getTrending()
    {
        $products = DB::table('product_details')->join('products', 'Products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $ran_pro = [];
        array_push($ran_pro, $products[0], $products[1], $products[2], $products[3]);
        $products = DB::table('product_details')->join('products', 'Products.ID', '=', 'product_details.Product_ID')->where('product_details.Is_Trending', 1)->paginate(13);
        return view('layouts.trending', ['products' => $products, 'randomProduct' => $ran_pro]);
    }

    public function getDiscount()
    {
        return view('layouts.discountProduct');
    }


    public function getSpecificProduct(Request $req)
    {
        // $Slug = $req -> Slug;
        // dd($Slug);
        $ID = $req->ID;
        $this_product = DB::table('Product_details')->join('Products', 'Products.ID', '=', 'product_details.Product_ID')->where('product_details.product_ID', $ID)->get();
        // $this_products = DB::table('Product_details')->where('Product_details.Slug', $Slug)->get();
        // $this_products = DB::table('product_details')->join('products','products.ID','=','product_details.Product_ID')->where('product_details.Slug', $Slug)->groupBy('Product_details.Product_ID')->get()->shuffle();

        // dd($this_products);
        
        return view('clientsPage.mainProduct', ['product' => $this_product]);
    }
}
