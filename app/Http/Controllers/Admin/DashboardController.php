<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard.list');
    }

    public function revenue(){
        $today = Carbon::now()->toDateString();
        $orders = DB::table('orders As o')
        ->join('orders_details as od', 'o.ID', 'od.Order_ID')
        ->leftJoin('product_details as pd', 'od.Product_Detail_ID', 'pd.ID')
        ->select(DB::raw('DATE_FORMAT(o.updated_at, "%H") as time'),DB::raw('sum(od.Quantity * Export_Price) as Total_Revenue'), DB::raw('sum(od.Quantity * Import_Price) as Total_Capital'), DB::raw('sum((od.Quantity * Export_Price) - (od.Quantity * Import_Price)) as Total_Profit'))
        ->whereDate('updated_at', $today)
        ->where('Status', 'Done')
        ->groupBy('time')
        ->get();
        // dd($orders);
        $total_revenue = 0;
        $total_capital = 0;
        foreach($orders as $order){
            $total_revenue += $order->Total_Revenue;
            $total_capital += $order->Total_Capital;
        }

        return view('admin.dashboard.revenue', compact('orders', 'total_revenue', 'total_capital'));
    }

    public function export(){
        return view('admin.dashboard.list');
    }

    public function order(){
        return view('admin.dashboard.list');
    }

    public function user(){
        return view('admin.dashboard.list');
    }

    public function trendingProduct(){
        return view('admin.dashboard.list');
    }
}
