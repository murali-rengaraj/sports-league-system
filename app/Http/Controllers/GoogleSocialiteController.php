<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleSocialiteController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleCalback(){
        $user =Socialite::driver('google')->user();
        // dd($user);
        $findUser= User::where("social_id",$user->id)->first();
        if($findUser){
            Auth::login($findUser);
            $findUser->assignRole($findUser->role);
            return redirect('/')->with('success','Login Successfully!');
        }else{
            $newUser= User::create([
                'name'=> $user->name,
                'email'=> $user->email,
                'password'=> Hash::make('google'. $user->id),
                'role'=> 'user',
                'social_id'=>$user->id,
                'social_type'=> 'google'
            ]);
            Auth::login($newUser);
            $findUser->assignRole($newUser->role);
            return redirect('/')->with('success','Login Successfully!!!');
        }
    }
}
