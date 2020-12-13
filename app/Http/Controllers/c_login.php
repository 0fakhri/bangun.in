<?php

namespace App\Http\Controllers;

use App\m_dataCV;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class c_login extends Controller
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
                $user = m_dataCV::where('user_id',(Auth()->user()->id ))->get('status_akun');
                foreach($user as $li){
                    $status = $li->status_akun;
                }
                // dd($status);
                if($status == 'Disetujui'){
                    // dd('hmmm');
                    return redirect('/cv/home');
                }
                else{
                    return redirect('/login');
                }
            }
        }
        elseif($request->email == null & $request->password == null){
            return redirect('/login')->with('null', 'Harap memasukan data dengan benar');
        }
        else{
            return redirect('/login')->with('salah', 'Harap memasukan data dengan benar');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
