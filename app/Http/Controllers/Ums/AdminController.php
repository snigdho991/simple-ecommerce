<?php

namespace App\Http\Controllers\Ums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Admin;

class AdminController extends Controller
{
    public function admin_dashboard()
    {
    	$products = Product::all();
    	return view('admin.dashboard', compact('products'));
    }
}
