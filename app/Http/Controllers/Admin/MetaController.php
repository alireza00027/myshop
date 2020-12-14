<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MetaRequest;
use App\Meta;
use App\Product;
use Illuminate\Http\Request;

class MetaController extends Controller
{



    public function insert(Product $product)
    {
        return view('admin.metas.insert',compact('product'));
    }


    public function store(MetaRequest $request)
    {
        Meta::create($request->all());
        return redirect()->route('products.show',['product'=>$request->input('product_id')]);
    }


    public function edit(Meta $meta)
    {
        return view('admin.metas.edit',compact('meta'));
    }


    public function update(MetaRequest $request ,Meta $meta)
    {
        $meta->update($request->all());
        return redirect()->route('products.show',['product'=>$request->input('product_id')]);
    }


    public function destroy(Meta $meta)
    {
        $meta->delete();
        return back();
    }
}
