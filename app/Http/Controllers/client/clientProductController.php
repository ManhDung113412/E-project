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

class clientProductController extends Controller
{
    public function getProductPages()
    {
        return view('layouts.productPage');
    }


    public function getLongWallet(Request $req)
    {
        $keyWord = $req->searchBox;

        $products = DB::table('products')->join('product_details', 'products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $cart_quantity = session()->get('cart_quantity');
        $ran_pro = $products->take(4);
        if (strlen($keyWord) > 0) {
            $longWallet = Category::join('Products', 'products.Category_ID', '=', 'categories.ID')
                ->join('product_details', 'products.ID', '=', 'product_details.Product_ID')
                ->where('Products.Name', 'like', '%' . $keyWord . '%')
                ->where('categories.ID', 3)
                ->groupBy('Product_details.Product_ID')
                ->get();
        } else {
            $longWallet = DB::table('categories')
                ->join('Products', 'Products.Category_ID', '=', 'categories.ID')
                ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')->where('categories.ID', 3)->groupBy('Product_details.Product_ID')
                ->paginate(13);
        }

        return view('layouts.longWallet', ['longWallet' => $longWallet, 'randomProduct' => $ran_pro, 'cart_quantity' => $cart_quantity]);
    }


    public function getSmallWallet(Request $req)
    {
        $keyWord = $req->searchBox;

        $products = DB::table('products')->join('product_details', 'products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $cart_quantity = session()->get('cart_quantity');
        $ran_pro = $products->take(4);

        if (strlen($keyWord) > 0) {
            $smallWallet = Category::join('Products', 'products.Category_ID', '=', 'categories.ID')
                ->join('product_details', 'products.ID', '=', 'product_details.Product_ID')
                ->where('Products.Name', 'like', '%' . $keyWord . '%')
                ->where('categories.ID', 4)
                ->groupBy('Product_details.Product_ID')
                ->get();
        } else {
            $smallWallet = DB::table('categories')
                ->join('Products', 'Products.Category_ID', '=', 'categories.ID')
                ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                ->where('categories.ID', 4)
                ->groupBy('Product_details.Product_ID')
                ->paginate(13);
        }

        return view('layouts.smallWallet', ['smallWallet' => $smallWallet, 'randomProduct' => $ran_pro, 'cart_quantity' => $cart_quantity]);
    }

    public function getCardsHolder(Request $req)
    {
        $keyWord = $req->searchBox;

        $products = DB::table('products')->join('product_details', 'products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $cart_quantity = session()->get('cart_quantity');
        $ran_pro = $products->take(4);

        if (strlen($keyWord) > 0) {
            $cardHolder = Category::join('Products', 'products.Category_ID', '=', 'categories.ID')
                ->join('product_details', 'products.ID', '=', 'product_details.Product_ID')
                ->where('Products.Name', 'like', '%' . $keyWord . '%')
                ->where('categories.ID', 1)
                ->groupBy('Product_details.Product_ID')
                ->get();
        } else {
            $cardHolder = DB::table('categories')
                ->join('Products', 'Products.Category_ID', '=', 'categories.ID')
                ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')->where('categories.ID', 1)
                ->groupBy('Product_details.Product_ID')
                ->paginate(13);
        }

        return view('layouts.cardsHolder', ['cardsHolder' => $cardHolder, 'randomProduct' => $ran_pro, 'cart_quantity' => $cart_quantity]);
    }


    public function getchainandStrap(Request $req)
    {
        $keyWord = $req->searchBox;

        $products = DB::table('products')->join('product_details', 'products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $cart_quantity = session()->get('cart_quantity');
        $ran_pro = $products->take(4);

        if (strlen($keyWord) > 0) {
            $chainAndStrap = Category::join('Products', 'products.Category_ID', '=', 'categories.ID')
                ->join('product_details', 'products.ID', '=', 'product_details.Product_ID')
                ->where('Products.Name', 'like', '%' . $keyWord . '%')
                ->where('categories.ID', 2)
                ->groupBy('Product_details.Product_ID')
                ->get();
        } else {
            $chainAndStrap = DB::table('categories')
                ->join('Products', 'Products.Category_ID', '=', 'categories.ID')
                ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')->where('categories.ID', 2)
                ->groupBy('Product_details.Product_ID')
                ->paginate(13);
        }
        return view('layouts.chainsandStrap', ['chainAndStrap' => $chainAndStrap, 'randomProduct' => $ran_pro, 'cart_quantity' => $cart_quantity]);
    }

    public function getGucci(Request $req)
    {
        $keyWord = $req->searchBox;

        $products = DB::table('products')->join('product_details', 'products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $cart_quantity = session()->get('cart_quantity');
        $ran_pro = $products->take(4);
        if (strlen($keyWord) > 0) {
            $gucci = Brand::join('Products', 'brands.ID', '=', 'Products.Brand_ID')
                ->join('product_details', 'products.ID', '=', 'product_details.Product_ID')
                ->where('Products.Name', 'like', '%' . $keyWord . '%')
                ->where('Products.Brand_ID', 4)
                ->groupBy('Product_details.Product_ID')
                ->get();
        } else {
            $gucci = DB::table('brands')
                ->join('products', 'Products.Brand_ID', '=', 'Brands.ID')
                ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')->where('Products.Brand_ID', 4)
                ->groupBy('Product_details.Product_ID')
                ->paginate(13);
        }
        return view('layouts.gucci', ['gucci' => $gucci, 'randomProduct' => $ran_pro, 'cart_quantity' => $cart_quantity]);
    }


    public function getLouisVuiton(Request $req)
    {
        $keyWord = $req->searchBox;

        $products = DB::table('products')->join('product_details', 'products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $cart_quantity = session()->get('cart_quantity');
        $ran_pro = $products->take(4);

        if (strlen($keyWord) > 0) {
            $louisVuiton = Brand::join('Products', 'brands.ID', '=', 'Products.Brand_ID')
                ->join('product_details', 'products.ID', '=', 'product_details.Product_ID')
                ->where('Products.Name', 'like', '%' . $keyWord . '%')
                ->where('Products.Brand_ID', 3)
                ->groupBy('Product_details.Product_ID')
                ->get();
        } else {
            $louisVuiton = DB::table('brands')
                ->join('products', 'Products.Brand_ID', '=', 'Brands.ID')
                ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')->where('Products.Brand_ID', 3)
                ->groupBy('Product_details.Product_ID')
                ->paginate(13);
        }
        return view('layouts.louisVuiton', ['louisVuiton' => $louisVuiton, 'randomProduct' => $ran_pro, 'cart_quantity' => $cart_quantity]);
    }


    public function getChannel(Request $req)
    {
        $keyWord = $req->searchBox;

        $products = DB::table('products')->join('product_details', 'products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $cart_quantity = session()->get('cart_quantity');
        $ran_pro = $products->take(4);
        if (strlen($keyWord) > 0) {
            $channel = Brand::join('Products', 'brands.ID', '=', 'Products.Brand_ID')
                ->join('product_details', 'products.ID', '=', 'product_details.Product_ID')
                ->where('Products.Name', 'like', '%' . $keyWord . '%')
                ->where('Products.Brand_ID', 1)
                ->groupBy('Product_details.Product_ID')
                ->get();
        } else {
            $channel = DB::table('brands')
                ->join('products', 'Products.Brand_ID', '=', 'Brands.ID')
                ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                ->where('Products.Brand_ID', 1)
                ->groupBy('Product_details.Product_ID')
                ->paginate(13);
        }

        return view('layouts.Channel', ['Channel' => $channel, 'randomProduct' => $ran_pro, 'cart_quantity' => $cart_quantity]);
    }
    public function getDior(Request $req)
    {
        $keyWord = $req->searchBox;

        $products = DB::table('products')->join('product_details', 'products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $ran_pro = $products->take(4);
        $cart_quantity = session()->get('cart_quantity');
        if (strlen($keyWord) > 0) {
            $dior = Brand::join('Products', 'brands.ID', '=', 'Products.Brand_ID')
                ->join('product_details', 'products.ID', '=', 'product_details.Product_ID')
                ->where('Products.Name', 'like', '%' . $keyWord . '%')
                ->where('Products.Brand_ID', 2)
                ->groupBy('Product_details.Product_ID')
                ->get();
        } else {
            $dior = DB::table('brands')
                ->join('products', 'Products.Brand_ID', '=', 'Brands.ID')
                ->join('product_details', 'Products.ID', '=', 'product_details.Product_ID')
                ->where('Products.Brand_ID', 2)
                ->groupBy('Product_details.Product_ID')
                ->paginate(13);
        }

        return view('layouts.dior', ['dior' => $dior, 'randomProduct' => $ran_pro, 'cart_quantity' => $cart_quantity]);
    }

    public function getNewArrival(Request $req)
    {
        $keyWord = $req->searchBox;

        $products = DB::table('products')->join('product_details', 'products.ID', '=', 'product_details.Product_ID')->get()->shuffle();
        $ran_pro = $products->take(4);
        $cart_quantity = session()->get('cart_quantity');

        if (strlen($keyWord) > 0) {
            $products = Product::where('Products.Name', 'like', '%' . $keyWord . '%')
                ->join('product_details', 'products.ID', '=', 'product_details.Product_ID')
                ->where('product_details.Is_New_Arrivals', 1)->get();
        } else {
            $products = DB::table('products')->join('product_details', 'products.ID', '=', 'product_details.Product_ID')->where('product_details.Is_New_Arrivals', 1)->paginate(13);
        }

        return view('layouts.newArrival', ['products' => $products, 'randomProduct' => $ran_pro, 'cart_quantity' => $cart_quantity]);
    }
    public function getTrending(Request $req)
    {
        $keyWord = $req->searchBox;

        $products = DB::table('products')
            ->join('product_details', 'products.ID', '=', 'product_details.Product_ID')
            ->get()
            ->shuffle();
        $ran_pro = $products->take(4);
        $cart_quantity = session()->get('cart_quantity');

        if (strlen($keyWord) > 0) {
            $products = Product::where('Products.Name', 'like', '%' . $keyWord . '%')
                ->join('product_details', 'products.ID', '=', 'product_details.Product_ID')
                ->where('product_details.Is_Trending', 1)
                ->groupBy('Product_details.Product_ID')->get();
        } else {
            $products = DB::table('products')->join('product_details', 'products.ID', '=', 'product_details.Product_ID')->where('product_details.Is_Trending', 1)->groupBy('Product_details.Product_ID')->paginate(13);
        }

        return view('layouts.trending', ['products' => $products, 'randomProduct' => $ran_pro, 'cart_quantity' => $cart_quantity]);
    }

    public function getDiscount()
    {
        $products = DB::table('products')
        ->join('product_details', 'products.ID', '=', 'product_details.Product_ID')
        ->get()->shuffle();

        $ran_pro = $products->take(4);
        $cart_quantity = session()->get('cart_quantity');

        // $products = DB::table('products')->join('product_details', 'products.ID', '=', 'product_details.Product_ID')->where('product_details.Is_Discounted', 1)->groupBy('Product_details.Product_ID')->paginate(13);
        return view('layouts.discountProduct', ['products' => $products, 'randomProduct' => $ran_pro, 'cart_quantity' => $cart_quantity]);
    }


    public function getSpecificProduct(Request $req)
    {
        $Slug = $req->Slug;
        $this_product = DB::table('Products')
        ->join('Product_details', 'Products.ID', '=', 'product_details.Product_ID')
        ->where('product_details.Slug', $Slug)->get();
        $random_products = DB::table('products')
        ->join('product_details', 'products.ID', '=', 'product_details.Product_ID')
        ->get()->shuffle();
        $ran_pro = $random_products->take(4);

        $product_ID =  $this_product[0]->Product_ID;

        $get_color = DB::table('Products')
        ->join('Product_details', 'Products.ID', '=', 'product_details.Product_ID')
        ->where('product_details.Product_ID', $product_ID)->get();
        $cart_quantity = session()->get('cart_quantity');
        return view('clientsPage.mainProduct', ['product' => $this_product, 'getColor' => $get_color, 'ran_pro' => $ran_pro, 'cart_quantity' => $cart_quantity]);
    }

    public function addToCart(Request $req)
    {


        $customer_ID = Auth::guard('users')->id();
        $this_customer = User::where('id', $customer_ID)->get();

        $customer_ID = $this_customer[0]->id;
        $carts = Cart::where('Customer_ID', $customer_ID)->get();
        session()->put('cart_quantity', count($carts));

        $cart_quantity = session()->get('cart_quantity');

        $Slug = $req->Slug;
        $this_product = DB::table('Products')->join('Product_details', 'Products.ID', '=', 'product_details.Product_ID')->where('product_details.Slug', $Slug)->get();
        $pro_ID = $this_product[0]->ID;



        DB::table('carts')->insert([
            'Product_quantity' => 1,
            'Customer_ID' => $customer_ID,
            'Product_Detail_ID' => $pro_ID
        ]);

        return redirect()->back();
    }
}
