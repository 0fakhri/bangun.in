<?php

namespace App\Http\Controllers;

use App\m_dataCV;
use App\m_rencanaPembangunan;
use Illuminate\Http\Request;

class c_rencanaPembangunanMasuk extends Controller
{
    public function setRencanaPembangunan(){
        $getid = Auth()->User()->id;
        $idcus = m_dataCV::where('user_id',$getid)->get('id');
        foreach ($idcus as $li){
            $idnya = $li->id;
        }
        $get = m_rencanaPembangunan::join('pembayaran','pembangunan.pembayaran_id','=','pembayaran.id_pembayaran')->join('pesanan','pembayaran.id_pesanan','=','pesanan.id_pesan')->where('cv_id',$idnya)->get();
        // dd($get);
        return view('cv.v_rencanaPembangunanMasuk',['data'=>$get]);
    }
}
