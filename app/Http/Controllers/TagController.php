<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{



    public function showList(Tag $tag)
    {
        $products=$tag->products;
        return view('app.tags.showList',compact('products'));

    }
}
