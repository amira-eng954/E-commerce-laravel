<?php


namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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

    public function insertCart($id, Request $request)
    {
        $user = Auth::user();
        $data = $request->validate([
            'qun' => 'required'
        ]);
        $cart = $user->carts()->create([
            'qun' => $data['qun'],
            'product_id' => $id
        ]);
        session()->flash('suc', "product added in cart  suc");
        return redirect(url('carts'));
    }


    public function myCarts()
    {
        $user = Auth::user();
        $carts = $user->carts()
            ->with('product')->latest()->get();

        $total = $carts->sum(function ($cart) {
            return $cart->qun * $cart->product->price;
        });
        $cats = Cat::all();
        return view('user.cart', compact("cats", "total", "carts"));
    }



    public function delete($id)
    {
        $user = Auth::user();
        $data = $user->carts()->find($id)->delete();
        session()->flash('suc', "product deleted from cart  suc");
        return redirect(url('carts'));
    }

    public function confirm()
    {

        $cats = Cat::all();

        return view('user.confirm', ['cats' => $cats]);
    }
}
