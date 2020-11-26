<?php

namespace App\Http\Controllers;

use App\m_dataProduk;
use Illuminate\Http\Request;

class c_detailProduk extends Controller
{
    public function produkAction($id) {
        
        $get = m_dataProduk::join('cv_perencana','desain_rumah.cv_id','=','cv_perencana.id')->where('desain_rumah.id',$id)->get();
        // dd($get);
        return view('customer.v_detailProduk',['data'=>$get]);
    }
}
