<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cat;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
   
        

 
    public function index()
    {
      $products=Product::with('cat')
      ->where('status','active')
      ->latest()
      ->get();
      $cats=Cat::all();
         return view('user.home',compact("products","cats"));
    }

    public function cats($id)
    {
     
     $products=Product::where("cat_id","=",$id)->get();
     // $products=Cat::with('product')->get();
      //return
      //dd( $products);
      $cats=Cat::all();
     
         return view('user.cat',compact("products","cats"));
        

        }




 public function oneproduct($id)
    {
     
      $products=Product::find($id);
      $cats=Cat::all();
     
         return view('user.show',["data"=>$products,'cats'=>$cats]
         );  

        }
        public function about()
        { $cats=Cat::all();
            return view('user.about',['cats'=>$cats]);
        }

        public function contact()
        { $cats=Cat::all();
            return view('user.contact',['cats'=>$cats]);
        }

 

}
