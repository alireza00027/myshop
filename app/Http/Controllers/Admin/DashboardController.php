<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        Schema::rename('cards','carts');
        Schema::rename('card_items','cart_items');
        return view('admin.dashboard.index');
    }
}
