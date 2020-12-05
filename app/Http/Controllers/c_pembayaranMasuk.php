<?php

namespace App\Http\Controllers;

use App\m_dataCV;
use App\m_pembayaran;
use Illuminate\Http\Request;

class c_pembayaranMasuk extends Controller
{
    public function setPembayaran(){
        $getid = Auth()->User()->id;
        $idcus = m_dataCV::where('user_id',$getid)->get('id');
        foreach ($idcus as $li){
            $idnya = $li->id;
        }
        // dd($idnya);
        $get = m_pembayaran::join('pesanan','pembayaran.id_pesanan','=','pesanan.id')->where('cv_id',$idnya)->get();
        dd($get);
        return view('cv.v_pembayaranMasuk',['data'=>$get]);
    }
}
