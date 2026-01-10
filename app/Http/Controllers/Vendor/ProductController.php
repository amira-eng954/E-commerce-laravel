<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendorProductRequest;
use App\Models\Cat;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        $products=Product::where('user_id',Auth::user()->id)->get();
       // dd($products);
      // $products->load('cat');
       //$products=Auth::user()->products()->get();
       dd($products->toArray());
       //dd(Auth::user()->id);
      // return view('vendor.index',compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $cats=Cat::all();
        return view('vendor.create',compact("cats"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendorProductRequest $request)
    {
        //
        $product=$request->validated();
        $product['user_id']= Auth::id();
         $data['image']=Storage::putFile("products",$product['image']);
        Product::create($product);
        
       
        session()->flash('suc',"Product suc");
        return redirect(route('vendor.products'));
      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user=Auth::user();
        $product=$user->product()->find($id);
          $this->authorize('delete', $product);
          $product->delete();
    }
}
