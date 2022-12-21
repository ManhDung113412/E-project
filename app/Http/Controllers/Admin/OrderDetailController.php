<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index()
    {
        $order_details = OrderDetail::all();
        $orders = Order::all();
        $products = Product::all();
        return view('admin.order_detail.list', compact('order_details', 'orders', 'products'));
    }

    public function edit($id)
    {
        $order = Order::find($id);
        return view('admin.order_detail.edit', compact('order'));
    }

    public function detail($id)
    {
        $order = Order::find($id);
        $order_detail = OrderDetail::where('Order_ID', $id)->get();
        return view('admin.order_detail.detail', compact('order_detail', 'order'));
    }
}
