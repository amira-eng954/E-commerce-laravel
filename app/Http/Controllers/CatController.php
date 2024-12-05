<?php

namespace App\Http\Controllers;
use App\Models\Cat;
use App\Models\Product;
use Illuminate\Http\Request;

class CatController extends Controller
{
    //
    function all()
    {
        $data=Cat::all();
        //print_r($data);
        return view('admin.cats.all',["data"=>$data]);
    }
    function select($id)
    {
        $data=Cat::find($id);
        return view('admin.cats.show',["data"=>$data]);
    }
    function create()
    {
        return view("admin.cats.create");
    }

    function store(Request $request)
    {
       
        $data=$request->validate([
            "namecat"=>"required|string",
            "body"=>"required|string",

            "order"=>"required"
        ]);
        Cat::create($data);
        session()->flash('suc',"category added suc");
        return redirect(url("cats"));
        
    }

    function edit($id)
    {
         $data=Cat::find($id);
        return view("admin.cats.edit",['data'=>$data]);
    }

    function update($id,Request $request)
    {
       $d=Cat::find($id);
       
       $request->validate([
        "namecat"=>"required|string",
        "body"=>"required|string",

        "order"=>"required"
    ]);
   //echo $data['catname'],$data['desc'],$data['order'];
    
    $d->update([
        "namecat"=>$request->namecat,
        "body"=>$request->body,

        "order"=>$request->order
    ]);
    session()->flash('suc',"category updated suc");
    return redirect(url('cats'));

}
function delete($id)
    {
         $data=Cat ::find($id);
         $data->delete();
         session()->flash('suc','Category deleted suc');
         return redirect(url('cats'));

    }
     
   

   
        
}


