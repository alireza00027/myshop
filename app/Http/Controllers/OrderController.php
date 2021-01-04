<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use phpseclib3\File\ASN1\Maps\RelativeDistinguishedName;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=auth()->user();
        $orders=$user->orders;
        return view('app.orders.index',compact('user','orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=auth()->user();
        $cart=Cart::where('user_id',$user->id)->first();
        $cartItems=$cart->cartItems;
        $sumCartItemsPrice=0;
        foreach ($cartItems as $cartItem){
            $sumCartItemsPrice+=($cartItem->product_count)*($cartItem->getProduct())->price;
        }
        return view('app.orders.create',compact('cartItems','user','sumCartItemsPrice'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=auth()->user();
        $this->validate($request,[
            'address'=>'required'
        ]);
        $cart=Cart::where('user_id',$user->id)->first();
        $cartItems=$cart->cartItems;
        $address=$user->addresses->where('id',$request->input('address'))->first();
        $order=new Order();
        $order->user_id=$user->id;
        $order->city_id=$address->city->id;
        $order->address=$address->body;
        $order->status="processing";
        $order->total_price=$request->input('total_price');
        $order->save();
        foreach ($cartItems as $cartItem){
            $orderItem=new OrderItem();
            $orderItem->order_id=$order->id;
            $orderItem->product_id=$cartItem->product_id;
            $orderItem->product_count=$cartItem->product_count;
            $orderItem->price=$cartItem->product_count*($cartItem->getProduct())->price;
            $orderItem->save();
            $cartItem->delete();

        }
        return redirect()->route('orders.payment.show',['order'=>$order->id]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $orderItems=$order->orderItems;
        return view('app.orders.show',compact('order','orderItems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function paymentShow(Order $order)
    {
        return view('app.orders.payment',compact('order'));
    }
    public function payment(Order $order)
    {
        $order->update([
            'status'=>'processing'
        ]);
        return redirect()->route('orders.index');
    }
    public function cancel(Order $order)
    {
        $order->update([
            'status'=>'cancelled'
        ]);
        return back();
    }
}
