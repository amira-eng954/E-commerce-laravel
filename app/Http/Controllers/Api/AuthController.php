<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\services\VertifyCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    //
    public function register(RegisterRequest $request)
    {
        $validate = $request->validated();
        $validate['password'] = Hash::make($validate['password']);
        $user = User::create($validate);
        $token = $user->createToken('user')->plainTextToken;
        (new VertifyCode())->sendCode($user);
        return successResponse("suc register", $token);
    }

    public function login(Request $request)
    {
        $data = Validator::make(
            $request->all(),
            [
                'email' => "required|email",
                'password' => "required|min:3"
            ]
        );
        $data = $data->validated();
        $user = User::firstWhere('email', $data['email']);
        if (!$user) {
            return failedResponse("error email");
        }
        if (!Hash::check($data['password'], $user->password)) {
            return failedResponse("error password");
        }
        if ($user->tokens->count() > 0) {
            $user->tokens()->delete();
        }
        // (new )
        $token = $user->createToken('user')->plainTextToken;
        return successResponse("suc login", $token);
    }

    public function logout()
    {
        $user=Auth::user();
        $user->tokens()->delete();
        return successResponse("suc logout");
    }

    public function profile()
    {
        $user=Auth::user();
           return successResponse(data:$user);
        
    }
    
    public function Updateprofile(Request $request)
    { 
        $user=Auth::user();
        $validate=Validator::make($request->all(),[
       // 'email'=>"required|email,unique:users,email,".$user->id,
        'name'=>"required",
        'email'=>[
            'required',
            'email',
            Rule::unique('users','email')->ignore($user->id)
        ]
        ]);
        if($validate->fails())
            {
                return failedResponse(data:$validate->errors());
            }
           $user->update($validate->validated());
            return successResponse(data:$user);
    }
}
