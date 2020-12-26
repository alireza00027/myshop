<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{



    public function showList(Category $category)
    {
        $products=$category->products;
        return view('app.categories.showList',compact('products'));
    }
}
