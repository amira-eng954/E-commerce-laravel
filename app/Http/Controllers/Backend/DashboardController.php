<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cat;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
   

public function all ()
        {
          $cats=Cat::all();
          $products=Product::all();
          $users=User::all();
        
          return view('admin.dashboard',compact("cats","products","users"));
    
        }


    public function black ()
        {
           return view('admin.black');

        }

}