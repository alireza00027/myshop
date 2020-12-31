<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use App\State;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=auth()->user();
        $addresses=$user->addresses;
        return view('app.addresses.index',compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=auth()->user();
        $states=State::orderBy('title')->get();
        $cities=City::orderBy('title')->get();
        return view('app.addresses.create',compact('user','states','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'city_id'=>'required',
            'body'=>'required'
        ]);
        $address=new Address();
        $address->user_id=auth()->user()->id;
        $address->city_id=$request->input('city_id');
        $address->body=$request->input('body');
        $address->save();
        return redirect()->route('addresses.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        $user=auth()->user();
        $states=State::orderBy('title')->get();
        $cities=City::orderBy('title')->get();
        return view('app.addresses.edit',compact('address','user','cities','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $this->validate($request,[
            'city_id'=>'required',
            'body'=>'required'
        ]);
        $address->city_id=$request->input('city_id');
        $address->body=$request->input('body');
        $address->update();
        return redirect()->route('addresses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return back();
    }
}
