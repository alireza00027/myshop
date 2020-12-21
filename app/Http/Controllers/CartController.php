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

        if (auth()->user()){
            $user=auth()->user();
            $cart=$user->carts;
            if ($cart==NULL) {
                $cart = new Cart();
                $cart->user_id = $user->id;
                $cart->save();
            }
            $cartItem=new CartItem();
            $cartItem->product_id=$product->id;
            $cartItem->cart_id=$cart->id;
            $cartItem->product_count=$request->input('product_count');
            $cartItem->save();
            return redirect()->route('carts.show');
        }else{
            $sessionId=Session::getId();
            $cart=Cart::where('session_id',$sessionId)->first();
            if ($cart==NULL){
                $cart = new Cart();
                $cart->session_id = $sessionId;
                $cart->save();
            }
            $cartItem=new CartItem();
            $cartItem->product_id=$product->id;
            $cartItem->cart_id=$cart->id;
            $cartItem->product_count=$request->input('product_count');
            $cartItem->save();
            return redirect()->route('carts.show');

        }
    }


    public function show()
    {
        if (auth()->user()!=NULL){
            $user=auth()->user();
            $cart=Cart::where('user_id',$user)->first();
        }else{
            $sessionId=Session::getId();
            $cart=Cart::where('session_id',$sessionId)->first();
        }


        $cartItems=$cart->cartItems;

        return view('app.carts.show',compact('cart','cartItems'));
    }


    public function destroyCartItem(CartItem $cartItem)
    {
        $cartItem->delete();
        return back();
    }
}
