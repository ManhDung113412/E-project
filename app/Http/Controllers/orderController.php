<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\ProductDetail;

class orderController extends Controller
{
    public function getOrder(Request $req){
        $oder_code = $req->Code;
        $customer_ID = Auth::guard('users')->id();

        $this_order_details = DB::table('orders')
        ->where('customer_id', $customer_ID)
        ->join('orders_details','orders_details.Order_ID','=','orders.ID')
        ->join('product_details','orders_details.Product_Detail_ID','=','product_details.ID')
        ->join('Products','Products.ID','=','product_details.Product_ID')
        ->where('orders.Code', $oder_code)
        ->select('orders.Code','orders.created_at','orders.Status','orders_details.Price','orders_details.Quantity','product_details.Main_IMG','Products.Name','orders.Location','orders.Total_Paid','orders_details.Quantity')
        ->get();
        
        $this_order = DB::table('orders')
        ->where('customer_id', $customer_ID)
        ->where('Code',$oder_code)
        ->get();
        
        // dd($this_order_details[0]->Quantity);

        $kk = [];

        foreach($this_order_details as $item){
            array_push($kk,$item->Quantity);
        }

        $total_quantity = array_sum($kk);
        

        return view('clientsPage.order',compact('this_order_details','this_order','total_quantity'));
    }
}
