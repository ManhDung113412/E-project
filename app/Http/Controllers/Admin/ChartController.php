<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ChartController extends Controller
{
    public function index(){
        // $orders = DB::table('orders')
        // ->where('Status', 'Done')
        // ->
        return view('admin.chart.index');
    }

    public function bar(){
        
    }

    public function area(){
        
    }
}
