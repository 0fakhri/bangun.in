<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth()->user()->role == 'admin') {
                return redirect('/admin/home');
            }else if (Auth()->user()->role == 'customer') {
                return redirect('/customer/home');
            }else if (Auth()->user()->role == 'cv') {
                return redirect('/cv/home');
            }
        }
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
