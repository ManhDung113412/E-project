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
use Symfony\Component\HttpFoundation\Response;
use Alert;

class shoppingcartController extends Controller
{
    public function getShoppingCart(Request $req)
    {
        $customer_ID = Auth::guard('users')->id();
        $this_customer = User::where('id', $customer_ID)->get();
        $subtotals = 0;

        $carts = DB::table('carts As c')
            ->join('product_details as pd', 'c.Product_Detail_ID', 'pd.ID')
            ->join('products as p', 'pd.Product_ID', 'p.ID')
            ->select('Export_Price', 'Sale_Price', 'Main_IMG', 'Name', 'Color', 'Product_Detail_ID', 'Product_quantity', DB::raw('sum(c.Product_quantity * pd.Export_Price) as subtotal'))
            ->where('Customer_ID', $customer_ID)
            ->groupBy('Export_Price', 'Sale_Price', 'Main_IMG', 'Name', 'Color', 'Product_Detail_ID', 'Product_quantity')
            ->get();

        foreach ($carts as $cart) {
            $subtotals += $cart->subtotal;
        }

        return view('clientsPage.shoppingCart', compact('carts', 'subtotals'));



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

    // public function postShoppingCart(Request $request)
    // {
    //     if ($request->get('product')) {

    //         $product_id = $request->get('product');
    //         $customer_id = Auth::guard('users')->id();
    //         $old_quantity = DB::table('carts')
    //             ->where('Customer_ID', $customer_id)
    //             ->where('Product_Detail_ID', $product_id)
    //             ->select('Product_quantity')
    //             ->get();
    //         $cart = DB::table('carts')
    //             ->where('Customer_ID', $customer_id)
    //             ->where('Product_Detail_ID', $product_id)
    //             ->update([
    //                 'Product_quantity' => $old_quantity[0]->Product_quantity + 1,
    //             ]);
    //         $new_item = DB::table('carts')
    //             ->where('Customer_ID', $customer_id)
    //             ->where('Product_Detail_ID', $product_id)
    //             ->get();
    //         $item = $new_item[0];
    //         $output =  '<div>' . $item->Product_quantity . '</div>';
    //         echo $output;
    //     }
    // }


    public function handleIncreaseQuantity(Request $request)
    {
        if ($request->get('product')) {
            $product_id = $request->get('product');
            $customer_id = Auth::guard('users')->id();
            $old_quantity = DB::table('carts')
                ->where('Customer_ID', $customer_id)
                ->where('Product_Detail_ID', $product_id)
                ->select('Product_quantity')
                ->get();

            if ($old_quantity[0]->Product_quantity == 5) {
                return;
            }

            $cart = DB::table('carts')
                ->where('Customer_ID', $customer_id)
                ->where('Product_Detail_ID', $product_id)
                ->update([
                    'Product_quantity' => $old_quantity[0]->Product_quantity + 1,
                ]);

            $new_item = DB::table('carts As c')
                ->where('Customer_ID', $customer_id)
                ->where('Product_Detail_ID', $product_id)
                ->join('product_details as pd', 'c.Product_Detail_ID', 'pd.ID')
                ->join('products as p', 'pd.Product_ID', 'p.ID')
                ->select('c.*', 'pd.*', 'p.*', DB::raw('sum(c.Product_quantity * pd.Export_Price) as subtotal'))
                ->get();

            $subtotals_data = DB::table('carts As c')
                ->where('Customer_ID', $customer_id)
                ->join('product_details as pd', 'c.Product_Detail_ID', 'pd.ID')
                ->join('products as p', 'pd.Product_ID', 'p.ID')
                ->select(DB::raw('sum(c.Product_quantity * pd.Export_Price) as subtotal'))
                ->get();

            $item = $new_item[0];
            $output = $item->Product_quantity;
            $output1 = $item->subtotal;
            $subtotals = $subtotals_data[0]->subtotal;
            $kk = [];
            array_push($kk, $output, $output1, $subtotals);

            echo json_encode($kk);
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

            if ($old_quantity[0]->Product_quantity == 0) {
                return;
            }

            $cart = DB::table('carts')
                ->where('Customer_ID', $customer_id)
                ->where('Product_Detail_ID', $product_id)
                ->update([
                    'Product_quantity' => $old_quantity[0]->Product_quantity - 1,
                ]);
            $new_item = DB::table('carts as c')
                ->where('Customer_ID', $customer_id)
                ->where('Product_Detail_ID', $product_id)
                ->join('product_details as pd', 'c.Product_Detail_ID', 'pd.ID')
                ->join('products as p', 'pd.Product_ID', 'p.ID')
                ->select('c.*', 'pd.*', 'p.*', DB::raw('sum(c.Product_quantity * pd.Export_Price) as subtotal'))
                ->get();

            $subtotals_data = DB::table('carts As c')
                ->where('Customer_ID', $customer_id)
                ->join('product_details as pd', 'c.Product_Detail_ID', 'pd.ID')
                ->join('products as p', 'pd.Product_ID', 'p.ID')
                ->select(DB::raw('sum(c.Product_quantity * pd.Export_Price) as subtotal'))
                ->get();

            $item = $new_item[0];
            $output = $item->Product_quantity;
            $output1 = $item->subtotal;
            $subtotals = $subtotals_data[0]->subtotal;
            $kk = [];
            array_push($kk, $output, $output1, $subtotals);

            echo json_encode($kk);
        }
    }


    public function removeFromCart(Request $req)
    {
        $productID = $req->ID;
        $customer_ID = Auth::guard('users')->id();
        Cart::where('Customer_ID', $customer_ID)
            ->where('Product_Detail_ID', $productID)
            ->delete();
        return redirect()->back();
    }

    public function getDiscountCode(Request $request)
    {
        if ($request->get('discountCount')) {
            $code = $request->get('discountCount');

            $discountCode = DB::table('codes')
                ->where('Code', $code)
                ->get();

            if (!$discountCode->isEmpty()) {
                $discount = $discountCode[0]->Discount;
                echo $discount;
            } else {
                $error = ['error' => 'Your Discount Code Is Invalid Or Expire'];
                return response()->json($error);
            }
        }
    }

    public function addToCart(Request $req)
    {
        // dd('gege');
        $customer_ID = Auth::guard('users')->id();
        $this_customer = User::where('id', $customer_ID)->get();
        $pro_ID = $req->ID;
        $customer_ID = $this_customer[0]->id;

        if (DB::table('carts')
            ->where('customer_id', $customer_ID)
            ->where('Product_Detail_ID', $pro_ID)
            ->exists()
        ) {
            Alert::success('Success Title', 'Success Message');

            // return redirect()->back();
        } else {

            DB::table('carts')
                ->insert([
                    'Product_Detail_ID' => $pro_ID,
                    'Customer_ID'   => $customer_ID,
                    'Product_quantity' => 1,
                    'created_at' => time()
                ]);

            return redirect()->back();
        }
    }

    public function checkOut(Request $req)
    {
        $customer_ID = Auth::guard('users')->id();
    }
}
