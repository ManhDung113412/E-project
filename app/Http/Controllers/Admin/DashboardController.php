<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.list');
    }

    public function revenueByDay()
    {
        $today = Carbon::now()->toDateString();
        $orders = DB::table('orders As o')
            ->join('orders_details as od', 'o.ID', 'od.Order_ID')
            ->leftJoin('product_details as pd', 'od.Product_Detail_ID', 'pd.ID')
            ->select(DB::raw('DATE_FORMAT(o.updated_at, "%H") as time'), DB::raw('sum(od.Quantity * Export_Price) as Total_Revenue'), DB::raw('sum(od.Quantity * Import_Price) as Total_Capital'), DB::raw('sum((od.Quantity * Export_Price) - (od.Quantity * Import_Price)) as Total_Profit'))
            ->whereDate('updated_at', $today)
            ->where('Status', 'Done')
            ->groupBy('time')
            ->get();

        $total_revenue = 0;
        $total_capital = 0;
        foreach ($orders as $order) {
            $total_revenue += $order->Total_Revenue;
            $total_capital += $order->Total_Capital;
        }

        return view('admin.dashboard.revenue_by_day', compact('orders', 'total_revenue', 'total_capital'));
    }

    public function revenueByMonth()
    {
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
        foreach ($orders as $order) {
            $total_revenue += $order->Total_Revenue;
            $total_capital += $order->Total_Capital;
        }

        return view('admin.dashboard.revenue_by_month', compact('orders', 'total_revenue', 'total_capital'));
    }

    public function revenueByYear()
    {
        $year = Carbon::now()->format('Y');

        $orders = DB::table('orders As o')
            ->join('orders_details as od', 'o.ID', 'od.Order_ID')
            ->leftJoin('product_details as pd', 'od.Product_Detail_ID', 'pd.ID')
            ->select(DB::raw('DATE_FORMAT(o.updated_at, "%m") as time'), DB::raw('sum(od.Quantity * Export_Price) as Total_Revenue'), DB::raw('sum(od.Quantity * Import_Price) as Total_Capital'), DB::raw('sum((od.Quantity * Export_Price) - (od.Quantity * Import_Price)) as Total_Profit'))
            ->whereDate('updated_at', 'LIKE', '%' . $year . '%')
            ->where('Status', 'Done')
            ->groupBy('time')
            ->get();

        $total_revenue = 0;
        $total_capital = 0;
        foreach ($orders as $order) {
            $total_revenue += $order->Total_Revenue;
            $total_capital += $order->Total_Capital;
        }

        return view('admin.dashboard.revenue_by_year', compact('orders', 'total_revenue', 'total_capital'));
    }

    public function exportByDay()
    {
        $today = Carbon::now()->toDateString();
        $orders = DB::table('orders As o')
            ->join('orders_details as od', 'o.ID', 'od.Order_ID')
            ->leftJoin('product_details as pd', 'od.Product_Detail_ID', 'pd.ID')
            ->select(DB::raw('DATE_FORMAT(o.updated_at, "%H") as time'), DB::raw('sum(od.Quantity) as Total_Quantity'))
            ->whereDate('updated_at', $today)
            ->where('Status', 'Done')
            ->groupBy('time')
            ->get();

        $total_quantity = 0;

        foreach ($orders as $item) {
            $total_quantity += $item->Total_Quantity;
        }

        $top_products = DB::select(DB::raw("SELECT p.Name, SUM(od.Quantity) as Quantity, od.Product_Detail_ID FROM orders as o LEFT JOIN orders_details as od ON o.ID = od.Order_ID LEFT JOIN product_details as pd ON od.Product_Detail_ID = pd.ID LEFT JOIN products as p ON pd.Product_ID = p.ID WHERE o.updated_at LIKE '$today%' AND o.Status = 'Done' GROUP BY Name, Product_Detail_ID ORDER BY Quantity DESC LIMIT 3"));

        return view('admin.dashboard.export_by_day', compact('orders', 'top_products', 'total_quantity'));
    }

    public function exportByMonth()
    {
        $time = Carbon::now();
        $month = $time->format('Y-m');
        $orders = DB::table('orders As o')
            ->join('orders_details as od', 'o.ID', 'od.Order_ID')
            ->leftJoin('product_details as pd', 'od.Product_Detail_ID', 'pd.ID')
            ->select(DB::raw('DATE_FORMAT(o.updated_at, "%d") as time'), DB::raw('sum(od.Quantity) as Total_Quantity'))
            ->whereDate('updated_at', 'Like', $month . '%')
            ->where('Status', 'Done')
            ->groupBy('time')
            ->get();

        $total_quantity = 0;

        foreach ($orders as $item) {
            $total_quantity += $item->Total_Quantity;
        }

        $top_products = DB::select(DB::raw("SELECT p.Name, SUM(od.Quantity) as Quantity, od.Product_Detail_ID FROM orders as o LEFT JOIN orders_details as od ON o.ID = od.Order_ID LEFT JOIN product_details as pd ON od.Product_Detail_ID = pd.ID LEFT JOIN products as p ON pd.Product_ID = p.ID WHERE o.updated_at LIKE '$month%' AND o.Status = 'Done' GROUP BY Name, Product_Detail_ID ORDER BY Quantity DESC LIMIT 3"));

        return view('admin.dashboard.export_by_day', compact('orders', 'top_products', 'total_quantity'));
    }

    public function exportByYear()
    {
        $time = Carbon::now();
        $year = $time->format('Y');
        $orders = DB::table('orders As o')
            ->join('orders_details as od', 'o.ID', 'od.Order_ID')
            ->leftJoin('product_details as pd', 'od.Product_Detail_ID', 'pd.ID')
            ->select(DB::raw('DATE_FORMAT(o.updated_at, "%m") as time'), DB::raw('sum(od.Quantity) as Total_Quantity'))
            ->whereDate('updated_at', 'Like' , $year . '%')
            ->where('Status', 'Done')
            ->groupBy('time')
            ->get();

        $total_quantity = 0;

        foreach ($orders as $item) {
            $total_quantity += $item->Total_Quantity;
        }

        $top_products = DB::select(DB::raw("SELECT p.Name, SUM(od.Quantity) as Quantity, od.Product_Detail_ID FROM orders as o LEFT JOIN orders_details as od ON o.ID = od.Order_ID LEFT JOIN product_details as pd ON od.Product_Detail_ID = pd.ID LEFT JOIN products as p ON pd.Product_ID = p.ID WHERE o.updated_at LIKE '$year%' AND o.Status = 'Done' GROUP BY Name, Product_Detail_ID ORDER BY Quantity DESC LIMIT 3"));

        return view('admin.dashboard.export_by_day', compact('orders', 'top_products', 'total_quantity'));
    }

    public function orderByDay()
    {
        $today = Carbon::now()->toDateString();
        $data = DB::select(DB::raw("select count(ID) as order_quantity, Status from orders where updated_at Like '$today%' Group By Status"));

        $pending = 0;
        $done = 0;
        $cancel = 0;
        $orders = '';

        foreach ($data as $data) {
            $orders .= "['$data->Status', $data->order_quantity],";

            if ($data->Status == 'Pending') {
                $pending = $data->order_quantity;
            } elseif ($data->Status == 'Done') {
                $done = $data->order_quantity;
            } else {
                $cancel = $data->order_quantity;
            }
        }

        return view('admin.dashboard.order_by_day', compact('orders', 'pending', 'done', 'cancel'));
    }

    public function orderByMonth()
    {
        $time = Carbon::now();
        $month = $time->format('Y-m');

        $data = DB::select(DB::raw("select count(ID) as order_quantity, Status from orders where updated_at Like '$month%' Group By Status"));

        $pending = 0;
        $done = 0;
        $cancel = 0;
        $orders = '';

        foreach ($data as $data) {
            $orders .= "['$data->Status', $data->order_quantity],";

            if ($data->Status == 'Pending') {
                $pending = $data->order_quantity;
            } elseif ($data->Status == 'Done') {
                $done = $data->order_quantity;
            } else {
                $cancel = $data->order_quantity;
            }
        }

        return view('admin.dashboard.order_by_month', compact('orders', 'pending', 'done', 'cancel'));
    }

    public function orderByYear()
    {
        $time = Carbon::now();
        $month = $time->format('Y');

        $data = DB::select(DB::raw("select count(ID) as order_quantity, Status from orders where updated_at Like '$month%' Group By Status"));

        $pending = 0;
        $done = 0;
        $cancel = 0;
        $orders = '';

        foreach ($data as $data) {
            $orders .= "['$data->Status', $data->order_quantity],";

            if ($data->Status == 'Pending') {
                $pending = $data->order_quantity;
            } elseif ($data->Status == 'Done') {
                $done = $data->order_quantity;
            } else {
                $cancel = $data->order_quantity;
            }
        }

        return view('admin.dashboard.order_by_year', compact('orders', 'pending', 'done', 'cancel'));
    }

    public function userByDay()
    {
        $today = Carbon::now()->toDateString();
        $total_users = DB::select(DB::raw('select count(id) as total_users from users'));
        $users = DB::select(DB::raw("select count(id) as total_users, DATE_FORMAT(created_at, '%H') as time from users where created_at LIKE '$today%' Group By time"));

        $users = DB::table('users')
        ->select(DB::raw('count(id) as total_users'), DB::raw('DATE_FORMAT(created_at, "%H") as time'))
        ->whereDate('created_at', 'LIKE', "$today%")
        ->groupBy('time')
        ->get();

        $new_users = 0;

        foreach ($users as $user) {
            $new_users += $user->total_users;
        }

        return view('admin.dashboard.user_by_day', compact('total_users', 'new_users', 'users'));
    }

    public function userByMonth()
    {
        $time = Carbon::now();
        $month = $time->format('Y-m');
        $total_users = DB::select(DB::raw('select count(id) as total_users from users'));
        $users = DB::select(DB::raw("select count(id) as total_users, DATE_FORMAT(created_at, '%H') as time from users where created_at LIKE '$month%' Group By time"));

        $users = DB::table('users')
        ->select(DB::raw('count(id) as total_users'), DB::raw('DATE_FORMAT(created_at, "%d") as time'))
        ->whereDate('created_at', 'LIKE', "$month%")
        ->groupBy('time')
        ->get();

        $new_users = 0;

        foreach ($users as $user) {
            $new_users += $user->total_users;
        }

        return view('admin.dashboard.user_by_month', compact('total_users', 'new_users', 'users'));
    }

    public function userByYear()
    {
        $time = Carbon::now();
        $year = $time->format('Y');
        $total_users = DB::select(DB::raw('select count(id) as total_users from users'));
        $users = DB::select(DB::raw("select count(id) as total_users, DATE_FORMAT(created_at, '%H') as time from users where created_at LIKE '$year%' Group By time"));

        $users = DB::table('users')
        ->select(DB::raw('count(id) as total_users'), DB::raw('DATE_FORMAT(created_at, "%m") as time'))
        ->whereDate('created_at', 'LIKE', "$year%")
        ->groupBy('time')
        ->get();

        $new_users = 0;

        foreach ($users as $user) {
            $new_users += $user->total_users;
        }

        return view('admin.dashboard.user_by_year', compact('total_users', 'new_users', 'users'));
    }

    public function trendingProduct()
    {
        return view('admin.dashboard.list');
    }
}
