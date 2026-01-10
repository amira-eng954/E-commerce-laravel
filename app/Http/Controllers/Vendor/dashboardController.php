<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    //
    public function dashboard()
    {
        $products=User::with('product')->find(Auth::id());
       return view('vendor.dashboard',compact("products")); 
    }
}
