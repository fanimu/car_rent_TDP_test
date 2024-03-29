<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        // apakah login valid
        if (Auth::attempt($credentials)) {
            // apakah user status = active
            if(Auth::user()->status != 'active'){
                Session::flash('status', 'failed');
                Session::flash('message', 'Your account is not active yet. please contact admin!');
                return redirect('/login');
            }
            // $request->session()->regenerate();
            // return redirect()->intended('dashboard');
            Session::flash('status', 'failed');
            Session::flash('message', 'Login invalid');
            return redirect('login');


        }
    }
}
