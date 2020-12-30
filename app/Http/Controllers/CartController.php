<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartItem;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add(Request $request, Product $product)
    {
        if (auth()->check()) {
            $user = auth()->user();
            $cart = Cart::where('user_id', $user->id)->first();
            if ($cart === NULL) {
                $cart = new Cart();
                $cart->user_id = $user->id;
                $cart->save();
            }
            $oldCartItems = $cart->cartItems->pluck('product_id')->toArray();
            if(array_search($product->id,$oldCartItems)!==false){
                $oldCartItem=CartItem::where('cart_id',$cart->id)->where('product_id',$product->id)->first();
                $oldCartItem->pushCount($request->input('product_count'));
                return redirect()->route('carts.show');
            }else{
                $cartItem=new CartItem();
                $cartItem->product_id=$product->id;
                $cartItem->cart_id=$cart->id;
                $cartItem->product_count=$request->input('product_count');
                $cartItem->save();
                return redirect()->route('carts.show');
            }
        }else{
            $sessionId=Session::getId();
            $cart=Cart::where('session_id',$sessionId)->first();
            if ($cart===NULL){
                $cart = new Cart();
                $cart->session_id = $sessionId;
                $cart->save();
            }
            $oldCartItems = $cart->cartItems->pluck('product_id')->toArray();
            if(array_search($product->id,$oldCartItems)!==false){
                $oldCartItem=CartItem::where('cart_id',$cart->id)->where('product_id',$product->id)->first();
                $oldCartItem->pushCount($request->input('product_count'));
                return redirect()->route('carts.show');
            }else{
                $cartItem=new CartItem();
                $cartItem->product_id=$product->id;
                $cartItem->cart_id=$cart->id;
                $cartItem->product_count=$request->input('product_count');
                $cartItem->save();
                return redirect()->route('carts.show');
            }

        }
    }
    public function show()
    {
        if (auth()->check()){
            $user=auth()->user();
            $cart=Cart::where('user_id',$user->id)->first();
        }else{
            $sessionId=Session::getId();
            $cart=Cart::where('session_id',$sessionId)->first();
        }


        $cartItems=$cart->cartItems;
        $sumCartItems=0;
        foreach ($cartItems as $cartItem){
            $sumCartItems+=($cartItem->product_count)*($cartItem->getProduct())->price;
        }

        return view('app.carts.show',compact('cart','cartItems','sumCartItems'));
    }


    public function destroyCartItem(CartItem $cartItem)
    {
        $cartItem->delete();
        return back();
    }
}
