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
   
        public function all ()
        {
          $cats=Cat::all();
          $products=Product::all();
          $users=User::all();
        
          return view('admin.all',compact("cats","products","users"));
    
        }


    public function black ()
        {
           return view('admin.black');

        }

 
    public function index()
    {
      $products=Product::all();
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
