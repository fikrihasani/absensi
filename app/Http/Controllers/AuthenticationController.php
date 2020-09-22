<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    //
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }else{
            return redirect('/login');
        }
    }

    public function login(){
        return view('admin.login');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function register(){
        return view('admin.register');
    }

    public function store(Request $request){
        $table = new User();
        $table->name = $request->name;
        $table->email = $request->email;
        $table->password = Hash::make($request->password);
        if ($table->save()) {
            return redirect('/login')->with('email',$table->email)->with('password',$table->password);
        }
    }

}
