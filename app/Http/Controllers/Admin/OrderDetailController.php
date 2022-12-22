<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
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
        $user = User::find($order->Customer_ID);
        return view('admin.order_detail.edit', compact('order', 'user'));
    }

    public function update(Request $request,$id)
    {
        Order::where('ID', $id)->update([
            'Status' => $request->status,
        ]);
        return redirect()->route('admin.order-detail.edit', $id)->with('success', 'Updated Successfully!');
    }

    public function detail($id)
    {
        $order = Order::find($id);
        $order_detail = OrderDetail::where('Order_ID', $id)->get();
        $user = User::find($order->Customer_ID);
        return view('admin.order_detail.detail', compact('order_detail', 'order', 'user'));
    }
}
