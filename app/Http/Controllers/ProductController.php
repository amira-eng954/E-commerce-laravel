<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cat;
use App\Models\User;
use Illuminate\Http\Request;
use App\Events\CartEvent;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index()
    {
      $products=Product::paginate(5);
     return view('admin.products.product',compact("products"));

    }

    public function show($id)
    {
        $data=Product::find($id);
        return view('admin.products.show',['data'=>$data]);
    }

    public function create()
    {
        $cats=Cat::all();
        $users=User::all();
        return view('admin.products.create',compact("cats","users"));
    }

    public function store (ProductRequest $request)
    {
        $data=$request->validated();
        $data['image']=Storage::putFile("products",$data['image']);
        $product=Product::create($data);
        //event(new cartEvent( $product) );
        session()->flash('suc',"Product suc");
        return redirect(url('product'));
    }

    public function edit($id)
    {  $data=Product::find($id);
        $cats=Cat::all();
        $users=User::all();
        return view('admin.products.edit',compact("data","cats","users"));
    }

    public function update($id,UpdateProductRequest $request)
    {   
        $product=Product::find($id);
        $data=$request->validated();
        if($request->has('image'))
        {
            Storage::delete($product->image);
            $data['image']=Storage::putFile("products",$product['image']);
        }
        $product->update($data);
        session()->flash("suc"," Product updated");
        return redirect(url('product'));
    }

    public function destroy($id)
    {
        $product=Product::find($id);
        Storage::delete($product['image']);
        $product->delete();
        session()->flash("suc"," Product deleted");
        return redirect(url('product'));  
    }
}
