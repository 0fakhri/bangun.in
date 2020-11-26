<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_formPesanan extends Controller
{
    public function beliDesignAction($id) {
        
        // $get = m_dataProduk::join('cv_perencana','desain_rumah.cv_id','=','cv_perencana.id')->where('desain_rumah.id',$id)->get();
        // dd($get);
        return view('customer.v_formPesanan');
    }
}
