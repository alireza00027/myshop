<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LevelAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $roles=Role::latest()->with('users')->paginate(30);
        return view('admin.level.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.level.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'user_id'=>'required',
            'role_id'=>'required'
        ]);
        $user=User::find($request->input('user_id'));
        $user->roles()->sync($request->input('role_id'));
        return redirect()->route('level.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return void
     */
    public function edit(User $user)
    {
        return view('admin.level.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->input('role_id'));
        return redirect()->route('level.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();
        return redirect()->route('level.index');
    }
}
