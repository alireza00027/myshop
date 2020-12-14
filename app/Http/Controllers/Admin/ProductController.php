<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\True_;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products=Product::latest()->paginate(25);
       return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::orderBy('parent_id')->get();
        $tags=Tag::all();
        return view('admin.products.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if ($request->hasFile('images')){
            foreach ($request->file('images') as $image){
                $name=time().'.'.$image->getClientOriginalName();
                $image->move(public_path().'/productsImages/',$name);
                $data[]=$name;
            }
        }
        $product=new Product();
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->count=$request->input('count');
        $product->images=json_encode($data);
        $product->save();
        $product->categories()->sync($request->input('category_id'));
        $product->tags()->sync($request->input('tag_id'));

        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $categories=$product->categories;
        $tags=$product->tags;
        return view('admin.products.show',compact('product','categories','tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories=Category::orderBy('parent_id')->get();
        $tags=Tag::all();
        return view('admin.products.edit',compact('product','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        if ($request->hasFile('images')){
            foreach ($request->file('images') as $image){
                $name=time().'.'.$image->getClientOriginalName();
                $image->move(public_path().'/productsImages/',$name);
                $data[]=$name;
                $product->images=json_encode($data);
            }
        }
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->price=$request->input('price');
        $product->count=$request->input('count');
        $product->update();
        $product->categories()->sync($request->input('category_id'));
        $product->tags()->sync($request->input('tag_id'));
        return  redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}
