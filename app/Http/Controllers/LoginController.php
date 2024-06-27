<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function emp_signup()
    {
        return view('emp_signup');
    }
    public function emp_signup_action(Request $request) 
    {
        $request->validate(

            [
                'name'=>'required',
                'username'=>'required',
                'email'=>'required | email',
                'password'=> 'required | confirmed',
                'password_confirmation'=> 'required'
            ]
        );
        
        $user = new User;
        $user->name=$request['name'];
        $user->username=$request['username'];
        $user->email=$request['email'];
        $user->password=Hash::make($request['password']);
        $user->save();

        $user->notify(new \App\Notifications\WelcomeEmail($user));
 

        return view('emp_signup')->with('success', 'Thanks for Registration. Welcome Email has been sent');
    }

    public function login_action(Request $request)
    {
        $request->validate(
            [
                
            'username'=>'required',
            'password'=>'required'

            ]
        );

        $user=new User;

        $credentials = $request->only('username', 'password'  );
        //print_r($credentials) ;
        //die; 
        if (Auth::attempt($credentials)) 
        {
            
            $users = User::all();
  
            $request->session()->put('user_id', '123');
            return redirect("/emp_view")->with('success','Successfull Login!');
        
        }
  
       // return redirect("login")->with('invalid','Login details are not valid');
        return view("login")->with('invalid','Invalid Username /Password');
        
        //return view('login');
    }

    public function logout()
    {
        session()->forget('user_id');
        
        return redirect('login')->with('logout', 'You are successfully logged out');
    }
}
