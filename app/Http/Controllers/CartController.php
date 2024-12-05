<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cat;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
   




     
        

    public function carts($id ,Request $request)
       {  
    $user_id=Auth::user()->id;
            $data=$request->validate([
                'qun'=>'required'
            ]);
            //echo $data['qun'],$user_id,$id;
            Cart::create([
                'qun'=>$data['qun'],
                'user_id'=>$user_id,
                'product_id'=>$id
            ]);
            session()->flash('suc',"product added in cart  suc");
            return redirect(url('carts'));
            }
            public function all()
            {
                $id=Auth::user()->id;
                $product=Cart::where('user_id','=',$id)->get();
                $cats=Cat::all();
                
                return view('user.cart',['data'=>$product,'cats'=>$cats]);
            }
            
            

            public function delete($id)
            {
                $data=Cart::find($id);

                $data->delete();
                session()->flash('suc',"product deleted from cart  suc");
               
                return redirect(url('carts'));
            }
            public function confirm()
            {
               
                $cats=Cat::all();
                
                return view('user.confirm',['cats'=>$cats]);
                }
            }


