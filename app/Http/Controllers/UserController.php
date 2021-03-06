<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerIndex()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validation = $request -> validate([
           'email'=>'email|required',
           'name'=>'max:5|required',
           'password'=>'max:20|required|confirmed',
        ]);

        $user = new User();
        $user->email = $validation['email'];
        $user->name = $validation['name'];
        $user->password = Hash::make($validation['password']);
        $user->save();

        return view('welcome');
    }

    public function loginIndex()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validation = $request->validate([
           'email'=>'email|required',
           'password'=>'required'
        ]);

        if(Auth::attempt($validation)){
            return redirect()->route('home');
        } else {
            return redirect()->route('users.loginIndex');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
