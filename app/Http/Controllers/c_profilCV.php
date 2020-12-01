<?php

namespace App\Http\Controllers;

use App\m_dataCV;
use Illuminate\Http\Request;

class c_profilCV extends Controller
{
    public function profilCVaction($id) {
        
        $get = m_dataCV::join('desain_rumah','cv_perencana.id','=','desain_rumah.cv_id')->where('cv_perencana.id',$id)->get();
        // dd($get);
        $get2 = m_dataCV::where('cv_perencana.id',$id)->get();
        return view('customer.v_profilCV',['data'=>$get],['data2'=>$get2]);
    }
}
