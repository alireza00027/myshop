<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{


    public function index()
    {
        $orders=Order::latest()->paginate(30);
        return view('admin.orders.index',compact('orders'));
    }

    public function show(Order $order)
    {
        $orderItems=$order->orderItems;
        return view('admin.orders.show',compact('order','orderItems'));
    }

    public function indexProcessingOrders()
    {
        $orders=Order::where('status','processing')->latest()->paginate(30);
        return view('admin.orders.processing.index',compact('orders'));
    }

    public function confirm(Order $order)
    {
        $order->update(['status'=>'completed']);
        return redirect()->route('orders.processing.index');
    }

    public function showProcessingOrder(Order $order)
    {
        $orderItems=$order->orderItems;
        return view('admin.orders.processing.show',compact('order','orderItems'));
    }
}
