<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Providers\ComposerServiceProvider;
use App\Models\User;
use DB;
use App\Models\Category;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        View::composer('*',function($view){
            $customer_ID = Auth::guard('users')->id();
            $this_customer = User::where('id', $customer_ID)->get();
            $carts = DB::table('carts As c')
            ->join('product_details as pd', 'c.Product_Detail_ID', 'pd.ID')
            ->join('products as p', 'pd.Product_ID', 'p.ID')
            ->select('Export_Price', 'Sale_Price', 'Main_IMG', 'Name', 'Color', 'Product_Detail_ID', 'Product_quantity', DB::raw('sum(c.Product_quantity * pd.Export_Price) as subtotal'))
            ->where('Customer_ID', $customer_ID)
            ->groupBy('Export_Price', 'Sale_Price', 'Main_IMG', 'Name', 'Color', 'Product_Detail_ID', 'Product_quantity')
            ->get();

            $cart_quantity = count($carts);
            $wishList_quantity = count(WishList::where('Customer_ID',$customer_ID)->get());
            // dd($this_customer);
            $view->with(['customer_cart'=>$carts,'cart_quantity'=>$cart_quantity,'wishList_quantity'=>$wishList_quantity,'customer_infor'=>$this_customer[0]]);
        });  
    }
}
