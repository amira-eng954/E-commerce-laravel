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

class orderController extends Controller
{
    //
//admin control order


   public function adminorders()
   {
    $items=Item::all();
    return view('admin.order.all',['data'=>$items]);

   }

   public function edit($id)
   {
    $users=User::all();
    $data=Order::find($id);
    return view('admin.order.update',['data'=>$data,"users"=>$users]);
   }

   public function update($id , Request $request)
   {
   $order=Order::find($id);
    $data=$request->validate([
        'name'=>'required|string'
        ,'email'=>'required'
        ,'phone'=>'required'
        ,'address'=>'required'
        ,'code'=>'required'
        ,'payment'=>'required'
        ,'status'=>'required',
        'user_id'=>'required'

     ]);
    
   $order->update($data);
   session()->flash('suc',"Order updated suc");
    return redirect(url('adminorder'));
    
   }
  

   public function delete($id )
   {
   $order=Order::find($id);
  $order->delete($order);
  session()->flash('suc',"Order deleted suc");
  return redirect(url('adminorder'));
   }

 // end admin control order   
    public function allorder()
    {  $cats=Cat::all();
       
        $id=Auth::user()->id;
        $data=Item::where('user_id','=',$id)->get();
      
    
       return view('user.order',['data'=>$data,'cats'=>$cats]);
        
    }

    public function create_order(Request $request)
    {  $id=Auth::user()->id;
         $data=$request->validate([
            'name'=>'required'
            ,'email'=>'required'
            ,'phone'=>'required'
            ,'address'=>'required'
            ,'code'=>'required'
            ,'payment'=>'required'
   
         ]);
         $data['user_id']=$id;
        //print_r($data);
        Order::create($data);
        session()->flash('suc',"Order added suc");
        return redirect(url('amira'));
    }

    
    
    
    //echo $data['id'];
            public function delete_carts(){
                $id=Auth::user()->id;
               
               $carts=Cart::where('user_id','=',$id)->get();
               $ss=Order::where("user_id",'=',$id)->orderBy('id','desc')->take(1)->get();
               $d=$ss[0]->id;
            //    print_r($d);
            foreach($carts as $cart)
            {   
                $pro=$cart['product_id'];
                $qun=$cart['qun'];
                Item::create([
                    'qun'=>$qun,
                    'product_id'=>$pro,
                    'order_id'=>$d,
                    'user_id'=>$id,
    
                ]);
                $cart->delete();
             }
    
           
            //print_r($data);
             return redirect(url('All_order'));
            }
}
