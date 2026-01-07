<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Http\Requests\CatRequest;
use App\Models\Cat;
use App\Models\Product;
use Illuminate\Http\Request;

class CatController extends Controller
{
    //
    function index()
    {
        $cats=Cat::all();
        return view('admin.cats.all',compact("cats"));
    }

    function show($id)
    {
        $data=Cat::find($id);
        return view('admin.cats.show',["data"=>$data]);
    }


    function create()
    {
        return view("admin.cats.create");
    }


    function store(CatRequest $request)
    {
       $category=$request->validated();
        Cat::create($category);
        session()->flash('suc',"category added suc");
        return redirect(url("cats"));
        
    }

    function edit($id)
    {
         $data=Cat::find($id);
        return view("admin.cats.edit",['data'=>$data]);
    }

  function update($id,CatRequest $request)
    {
       $category=Cat::find($id);
       $category->update($request->validated());
      session()->flash('suc',"category updated suc");
      return redirect(url('cats'));

}
function destroy($id)
    {
         $data=Cat::find($id)->delete();
         session()->flash('suc','Category deleted suc');
         return redirect(url('cats'));

    }
     
   

   
        
}


