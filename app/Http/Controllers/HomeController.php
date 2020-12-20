<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products=Product::latest()->take(5)->get();
        return view('app.home',compact('products'));
    }
}
