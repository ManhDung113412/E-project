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

    public function revenueByDay(){
        $today = Carbon::now()->toDateString();
        $orders = DB::table('orders As o')
        ->join('orders_details as od', 'o.ID', 'od.Order_ID')
        ->leftJoin('product_details as pd', 'od.Product_Detail_ID', 'pd.ID')
        ->select(DB::raw('DATE_FORMAT(o.updated_at, "%H") as time'),DB::raw('sum(od.Quantity * Export_Price) as Total_Revenue'), DB::raw('sum(od.Quantity * Import_Price) as Total_Capital'), DB::raw('sum((od.Quantity * Export_Price) - (od.Quantity * Import_Price)) as Total_Profit'))
        ->whereDate('updated_at', $today)
        ->where('Status', 'Done')
        ->groupBy('time')
        ->get();

        $total_revenue = 0;
        $total_capital = 0;
        foreach($orders as $order){
            $total_revenue += $order->Total_Revenue;
            $total_capital += $order->Total_Capital;
        }

        return view('admin.dashboard.revenue_by_day', compact('orders', 'total_revenue', 'total_capital'));
    }

    public function revenueByMonth(){
        $month = Carbon::now()->format('Y-m');

        $orders = DB::table('orders As o')
        ->join('orders_details as od', 'o.ID', 'od.Order_ID')
        ->leftJoin('product_details as pd', 'od.Product_Detail_ID', 'pd.ID')
        ->select(DB::raw('DATE_FORMAT(o.updated_at, "%d") as time'), DB::raw('sum(od.Quantity * Export_Price) as Total_Revenue'), DB::raw('sum(od.Quantity * Import_Price) as Total_Capital'), DB::raw('sum((od.Quantity * Export_Price) - (od.Quantity * Import_Price)) as Total_Profit'))
        ->whereDate('updated_at', 'LIKE', '%' . $month . '%')
        ->where('Status', 'Done')
        ->groupBy('time')
        ->get();

        $total_revenue = 0;
        $total_capital = 0;
        foreach($orders as $order){
            $total_revenue += $order->Total_Revenue;
            $total_capital += $order->Total_Capital;
        }

        return view('admin.dashboard.revenue_by_month', compact('orders', 'total_revenue', 'total_capital'));
    }

    public function revenueByYear(){
        $year = Carbon::now()->format('Y');

        $orders = DB::table('orders As o')
        ->join('orders_details as od', 'o.ID', 'od.Order_ID')
        ->leftJoin('product_details as pd', 'od.Product_Detail_ID', 'pd.ID')
        ->select(DB::raw('DATE_FORMAT(o.updated_at, "%m") as time'),DB::raw('sum(od.Quantity * Export_Price) as Total_Revenue'), DB::raw('sum(od.Quantity * Import_Price) as Total_Capital'), DB::raw('sum((od.Quantity * Export_Price) - (od.Quantity * Import_Price)) as Total_Profit'))
        ->whereDate('updated_at', 'LIKE', '%' . $year . '%')
        ->where('Status', 'Done')
        ->groupBy('time')
        ->get();

        $total_revenue = 0;
        $total_capital = 0;
        foreach($orders as $order){
            $total_revenue += $order->Total_Revenue;
            $total_capital += $order->Total_Capital;
        }

        return view('admin.dashboard.revenue_by_year', compact('orders', 'total_revenue', 'total_capital'));
    }

    public function exportByDay(){
        $time = Carbon::now()->toDateString();

        $orders = DB::table('orders As o')
        ->join('orders_details as od', 'o.ID', 'od.Order_ID')
        ->leftJoin('product_details as pd', 'od.Product_Detail_ID', 'pd.ID')
        ->select(DB::raw('DATE_FORMAT(o.updated_at, "%H") as time'),DB::raw('sum(od.Quantity) as Total_Quantity'))
        ->whereDate('updated_at', $time)
        ->where('Status', 'Done')
        ->groupBy('time')
        ->get();

        $total_quantity = 0;

        foreach($orders as $item){
            $total_quantity += $item->Total_Quantity;
        }

        $top_products = DB::table('orders As o')
        ->leftJoin('orders_details as od', 'o.ID', 'od.Order_ID')
        ->leftJoin('product_details as pd', 'od.Product_Detail_ID', 'pd.ID')
        ->select(DB::raw('sum(od.Quantity) as top_products'), 'od.Product_Detail_ID', 'od.Order_ID')
        ->whereDate('updated_at', $time)
        ->where('Status', 'Done')
        ->groupBy('Product_Detail_ID')
        ->orderBy('top_products', 'DESC')
        ->take(3)
        ->get();

        return view('admin.dashboard.export_by_day', compact('orders', 'top_product', 'total_quantity'));
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
