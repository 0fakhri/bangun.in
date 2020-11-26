<?php

namespace App\Http\Controllers;

use App\m_dataProduk;
use Illuminate\Http\Request;

class c_profilCV extends Controller
{
    public function profilCVaction($id) {
        
        $get = m_dataProduk::join('cv_perencana','desain_rumah.cv_id','=','cv_perencana.id')->where('cv_id',$id)->get();
        // dd($get);
        return view('customer.v_profilCV',['data'=>$get]);
    }
}
