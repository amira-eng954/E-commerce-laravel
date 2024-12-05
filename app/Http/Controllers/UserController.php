<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function all()
    {
        $data=User::all();
        //var_dump($data);
        return view('admin.users.selectAll',["data"=>$data]);
    }
    function select($id)
    {
        $data=User::find($id);
        //var_dump($data);
        return view('admin.users.show',["data"=>$data]);
    }

     function create()
     {
        return view('admin.users.add');
     }

     function store(Request $request)
     {
        $data=$request->validate([
            'name'=>"required|string",
            'email'=>"required|string",
            'password'=>"required|string"

        ]);

       User::create($data);
       session()->flash("suc","member added suc");
      return  redirect(url('users'));
     }

     function edit($id)
     {
        $data=User::find($id);
        return  view('admin.users.edit',['data'=>$data]);
     }

     function update($id,Request $request)
     {
        $data=User::find($id);
        $request->validate([
            "name"=>"required|string",
            "email"=>"required|string",
            "password"=>"required|string",
        ]);
        $data->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,

        ]);
        session()->flash("suc","member updatesd suc");
       return redirect(url('users'));

     }
     function delete($id)
     {
        $data=User::find($id);
        $data->delete();
        session()->flash("suc","member deleted suc");
        return  redirect(url('users'));
     }

     ///////////admin control order////

     

     


}


