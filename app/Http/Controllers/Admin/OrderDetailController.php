<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $order = Order::find($id);

        // Cancel
        if($request->status == 'Cancel'){
            $order->where('ID', $id)->update([
                'Status' => 'Cancel'
            ]);
            return redirect()->route('admin.order-detail.edit', $id)->with('success', 'Canceled Successfully!');
        }

        // Done
        if($request->status == 'Done'){
            $order->where('ID', $id)->update([
                'Status' => 'Done'
            ]);
            $orderPrice = DB::table('orders_details')
                            ->select(DB::raw('sum(Price * Quantity) as totalPrice'))
                            ->where('Order_ID', $id)
                            ->get();
                            
            $user = User::find($order->Customer_ID);
            $oldTotalSpending = $user->Total_Amount_Spent;
            $newTotalSpending = $oldTotalSpending + $orderPrice[0]->totalPrice;

            if($newTotalSpending >= 5000){
                $user->where('id', $order->Customer_ID)->update([
                    'Total_Amount_Spent' => $newTotalSpending,
                    'Rank' => 'DIAMOND',
                ]);
                return redirect()->route('admin.order-detail.edit', $id)->with('success', 'This Order Was Doned!');
            }

            if($newTotalSpending >= 3000){
                $user->where('id', $order->Customer_ID)->update([
                    'Total_Amount_Spent' => $newTotalSpending,
                    'Rank' => 'VIP',
                ]);
                return redirect()->route('admin.order-detail.edit', $id)->with('success', 'This Order Was Doned!');
            }

            $user->where('id', $order->Customer_ID)->update([
                'Total_Amount_Spent' => $newTotalSpending,
            ]);
            return redirect()->route('admin.order-detail.edit', $id)->with('success', 'This Order Was Doned!');
        }
    }

    public function detail($id)
    {
        $order = Order::find($id);
        $order_detail = OrderDetail::where('Order_ID', $id)->get();
        $user = User::find($order->Customer_ID);
        // dd($order->ID);
        return view('admin.order_detail.detail', compact('order_detail', 'order', 'user'));
    }
}
