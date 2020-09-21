<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    //
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/admin');
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
        $table->email = $request->email;
        $table->password = $request->password;
        if ($table->save()) {
            return redirect('/login');
        }
    }

}
