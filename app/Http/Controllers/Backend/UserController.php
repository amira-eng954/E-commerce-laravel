<?php



namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $users=User::paginate(5);
        return view('admin.users.selectAll',compact("users"));
    }
    function show($id)
    {
        $data=User::find($id);
        //var_dump($data);
        return view('admin.users.show',["data"=>$data]);
    }

     function create()
     {
        return view('admin.users.add');
     }

     function store(UserRequest $request)
     {
       User::create($request->validated());
       session()->flash("suc","member added suc");
      return  redirect(url('users'));
     }


     function edit($id)
     {
        $data=User::find($id);
        return  view('admin.users.edit',compact("data"));
     }

     function update($id,UserRequest $request)
     {
        $user=User::find($id);
        $user->update($request->validated());
        session()->flash("suc","member updatesd suc");
       return redirect(url('users'));

     }

     function destroy($id)
     {
        $data=User::find($id)->delete();
        session()->flash("suc","member deleted suc");
        return  redirect(url('users'));
     }

     ///////////admin control order////

     

     


}


