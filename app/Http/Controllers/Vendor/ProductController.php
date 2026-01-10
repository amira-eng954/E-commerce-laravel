<?php

namespace App\Http\Controllers\vendor;

use App\Events\ProductEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
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
        $products=Auth::user()->product()->with('cat')->get();
        
      
    
      return view('vendor.products.index',compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('create',Product::class);
        $cats=Cat::all();
        return view('vendor.products.create',compact("cats"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendorProductRequest $request)
    {
        //
        $user=Auth::user();
        $product=$request->validated();
        $product['user_id']=$user->id;
        $product['image']=Storage::putFile("products",$product['image']);
        //$product=$user->product()->create($product);
        $product=Product::create($product);
        ProductEvent::dispatch($product);
      //  dd($product);
       
        session()->flash('suc',"Product suc");
       
         return redirect(route('vendor.products.index'));
      
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
        $data=Auth::user()->Product()->find($id);
        $this->authorize('update',$data);
       $this->authorize('update',$data);
        $cats=Cat::all();
       //dd($data);
        return view('vendor.products.edit',compact("data","cats"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VendorProductRequest $request, string $id)
    {   $user=Auth::user();
         $product=$user->Product()->find($id);
        $data=$request->validated();
        $data['user_id']=$user->id;
        if($request->has('image'))
        {
            Storage::delete($product->image);
            $data['image']=Storage::putFile("products",$product['image']);
        }
        $product->update($data);
        //dd($data['user_id']);
        session()->flash("suc"," Product updated");
        return redirect(route('vendor.products.index'));
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
          session()->flash('suc',"Product deleted suc");
        return redirect(route('vendor.products.index'));
    }
}
