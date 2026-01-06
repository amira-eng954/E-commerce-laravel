<?php

namespace App\Http\Controllers;
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
        //var_dump($data);
        
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
         return view('user.home',["products"=>$products,'cats'=>$cats]);
    }

    public function cats($id)
    {
     
      $products=Product::where("cat_id","=",$id)->get();
      $cats=Cat::all();
     
         return view('user.cat',["products"=>$products,'cats'=>$cats]
         );  

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
