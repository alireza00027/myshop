<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::latest()->paginate(20);
        return view('app.products.index',compact('products'));
    }


    public function single(Product $product)
    {
        return view('app.products.single',compact('product'));
    }
}
