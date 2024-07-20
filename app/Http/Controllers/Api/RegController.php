<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegController extends Controller
{
    public function register(Request $request)
    {
        $validator = validator::make($request->all(),[
                'name'=>'required',
                'username'=>'required',
                'email'=>'required | email | unique:users',
                'password'=> 'required | confirmed',
                'password_confirmation'=> 'required'
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }
        else
        {
           
            $user = new User;
            $user->name=$request['name'];
            $user->username=$request['username'];
            $user->email=$request['email'];
            $user->password=Hash::make($request['password']);

            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $user->api_token = $success['token'];
            $success['username'] =  $user->username;

            $user->save();

            return response()->json([
                'status' => 200,
                'message' => 'Registration Successful!'
            ], 200);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
            
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status' => 422,
                'message' => $validator->messages()
            ], 422 );
        }
        else
        {
            $credentials = $request->only('username', 'password');
            $user = new User;

            if(Auth::attempt($credentials))
            {
                $user->username=$request['username'];

                $success['token'] =  $user->createToken('MyApp')->accessToken;
                $success['username'] =  $user->username;

                return response()->json([
                    'status' => 200,
                    'message' => 'Successful Login'
                ], 200 );
            }
            else{
                return response()->json([
                    'status' => 500,
                    'message' => 'Un-Authorize Access'
                ], 500 );
            }
        }
    }
}
