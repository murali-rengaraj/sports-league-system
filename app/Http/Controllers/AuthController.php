<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //Shows Register form
    public function createRegister(){
        // dd(Hash::make('admin'));
        return view('auth.register');
    }

    //Shows Login form
    public function showLogin(){
        return view('auth.login');
    }

    //Store new user information
    public function storeRegister(Request $request){
        $request->validate([
            'name'=>'required|string|alpha_num|min:4',
            'email'=>'required|email|unique:users,email',
            'password'=> 'required|min:8|confirmed'
        ]);

        $user= new User();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->role= 'user';
        $user->password= Hash::make($request->password);
        $user->save();

        return redirect('/login')->with('success', 'Register Successfully!');
    }

    //Check User or not
    public function checkLogin(Request $request){
        $request->validate([
            'email'=> 'required',
            'password'=> 'required',
        ]);
        $info=[
            'email'=>$request->email,
            'password'=> $request->password
        ];
        if (Auth::attempt($info)){
            $user = User::where('email', $request->email)->first();
            Auth::login($user);
            $user->assignRole($user->role);
            return redirect('/')->with('success','Login Successfully!');
        }else{
            return back()->with('invalid','Email or Password is invalid!');
        }
    }

    //Logout
    public function logout(){
        Auth::logout();
        return redirect('/')->with('success','Logout Successfully!');
    }

}
