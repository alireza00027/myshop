<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index ()
    {
        $user=auth()->user();
        return view('app.panel.index',compact('user'));
    }

    public function edit(User $user)
    {
        return view('app.panel.edit',compact('user'));
    }
    public function update(UserRequest $request , User $user)
    {
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->mobile=$request->input('mobile');
        $user->card_number=$request->input('card_number');
        $user->update();
        return redirect()->route('dashboard');
    }
}
