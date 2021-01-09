<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users=User::where('is_admin','0')->paginate(30);
        return view('admin.users.index',compact('users'));
    }



    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }

    public function setAdmin(User $user)
    {
        $user->is_admin="1";
        $user->update();
        return back();
    }
}
