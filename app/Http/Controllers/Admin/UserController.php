<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users=User::latest()->paginate(30);
        return view('admin.users.index',compact('users'));
    }



    public function delete(User $user)
    {
        $user->delete();
        return back();
    }
}
