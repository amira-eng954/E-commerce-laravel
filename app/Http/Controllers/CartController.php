<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cat;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Item;
use App\Events\CartEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
   
    public function carts($id ,Request $request)
       {  
           $user=Auth::user();
            $data=$request->validate([
                'qun'=>'required'
            ]);
           $cart= $user->cart()->create([
                'qun'=>$data['qun'],
                'product_id'=>$id
            ]);
            session()->flash('suc',"product added in cart  suc");
            return redirect(url('carts'));
            }


            public function all()
            {
                $user=Auth::user()->id;
                $product=User::with('cart')->find($user) ;
                $cats=Cat::all();
                return view('user.cart',['data'=>$product,'cats'=>$cats]);
            }
            
            

            public function delete($id)
            {
                $data=Cart::find($id)->delete();
                session()->flash('suc',"product deleted from cart  suc");
                return redirect(url('carts'));
            }
            
            public function confirm()
            {
               
                $cats=Cat::all();
                
                return view('user.confirm',['cats'=>$cats]);
                }
            }


