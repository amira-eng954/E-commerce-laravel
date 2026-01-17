<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cat;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Item;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{
    //
    //admin control order


    public function adminorders()
    {
        $items = Item::all();
        return view('admin.order.all', ['data' => $items]);
    }

    public function edit($id)
    {
        $users = User::all();
        $data = Order::find($id);
        return view('admin.order.update', ['data' => $data, "users" => $users]);
    }

    public function update($id, Request $request)
    {
        $order = Order::find($id);
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'code' => 'required',
            'payment' => 'required',
            'status' => 'required',
            'user_id' => 'required'

        ]);

        $order->update($data);
        session()->flash('suc', "Order updated suc");
        return redirect(url('adminorder'));
    }


    public function delete($id)
    {
        $order = Order::find($id);
        $order->delete($order);
        session()->flash('suc', "Order deleted suc");
        return redirect(url('adminorder'));
    }

    // end admin control order 

    public function MyOrder()
    {
        $cats = Cat::all();
        $data = Auth::user()->order()->with('orderItem')->latest()->get();
        return view('user.order', compact("data", "cats"));
    }

    public function create_order(Request $request)
    {  
        
        DB::beginTransaction();
        $user = Auth::user();
        try{
       $order= $user->order()->create([
            'total_price'=>0
        ]);
        $total=0;
          $carts=$user->carts()->with('product')->latest()->get();
        foreach($carts as $item)
            {
                OrderItem::create([
                    'qun'=>$item->qun,
                    'order_id'=>$order->id,
                    'product_id'=>$item->product_id,
                    'price'=>$item->product->price
                ]);
                $total+= $item->qun *$item->product->price;
            }

        //  $total = $user->carts()->sum(function ($cart) {
        //     return $cart->qun * $cart->product->price;});
            $order->update([
                'total_price'=>$total
            ]);
            DB::commit();
         $carts->delete();
        session()->flash('suc', "Order added suc");
        //return redirect()->route("payment.order");
        dd($order);
        }
        catch(\Exception $e)
        {
              DB::rollBack();


        return redirect()
            ->back()
            ->with('error', 'Something went wrong, please try again.');
        }
    }




    //echo $data['id'];
    public function delete_carts()
    {
        $id = Auth::user()->id;

        $carts = Cart::where('user_id', '=', $id)->get();
        $ss = Order::where("user_id", '=', $id)->orderBy('id', 'desc')->take(1)->get();
        $d = $ss[0]->id;
        //    print_r($d);
        foreach ($carts as $cart) {
            $pro = $cart['product_id'];
            $qun = $cart['qun'];
            Item::create([
                'qun' => $qun,
                'product_id' => $pro,
                'order_id' => $d,
                'user_id' => $id,

            ]);
            $cart->delete();
        }


        //print_r($data);
        return redirect(url('All_order'));
    }
}
