<?php

namespace App\Http\Controllers;

use App\m_dataCustomer;
use App\m_dataCV;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class c_home extends Controller
{
    public function setDataCv(){
        $getid = Auth()->User()->id;
        $get = m_dataCV::join('users','cv_perencana.user_id','=','users.id')->where('user_id',$getid)->get();
        // dd($get);
        return view('cv.home',['data'=>$get]);
    }

    public function setDataCustomer(){
        $getid = Auth()->User()->id;
        $get = m_dataCustomer::join('users','customer.user_id','=','users.id')->where('user_id',$getid)->get();
        return view('customer.home',['data'=>$get]);
    }

    public function indexAdmin(){
        return view('admin.home');
    }


}
