<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function all ()
    {
      $data=Product::paginate(5);
      return view('admin.products.product',['data'=>$data]);

    }

    public function show ($id)
    {
        $data=Product::find($id);
        return view('admin.products.show',['data'=>$data]);
    }

    public function create()
    {
        //echo"nnnnn";
        $cats=Cat::all();
        $users=User::all();
        return view('admin.products.create',['cats'=>$cats,'users'=>$users]);
    }

    public function store (Request $request)
    {
        $data=$request->validate([
            'title'=>'required|string',
            'desc'=>'required|string',
            'qun'=>'required|string',
            'price'=>'required',
            'cat_id'=>'required',
            'user_id'=>'required',
            'image'=>'required|image|mimes:png,jpg,avif,jpeg,webp'

        ]);
        $data['image']=Storage::putFile("products",$data['image']);
        Product::create($data);
        session()->flash('suc',"Product suc");
        
        return redirect(url('product'));
    }

    public function edit($id)
    {  $data=Product::find($id);
        $cats=Cat::all();
        $users=User::all();
        return view('admin.products.edit',["data"=>$data,'users'=>$users,'cats'=>$cats]);
    }

    public function update($id,Request $request)
    {   
        $d=Product::find($id);
        
        $data=$request->validate([
            'title'=>'required|string',
            'desc'=>'required|string',
            'qun'=>'required|string',
            'price'=>'required',
            'cat_id'=>'required',
            'user_id'=>'required',
            'image'=>'image|mimes:png,jpg,avif,jpeg,webp'

        ]);

        if($request->has('image'))
        {
            Storage::delete($d->image);
            $data['image']=Storage::putFile("products",$data['image']);
        }
        $d->update($data);
        session()->flash("suc"," Product updated");


        return redirect(url('product'));
    }

    public function delete ($id)
    {
        $dd=Product::find($id);
        Storage::delete($dd['image']);
        $dd->delete();
        session()->flash("suc"," Product deleted");
        return redirect(url('product'));  
    }
}
