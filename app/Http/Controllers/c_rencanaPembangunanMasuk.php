<?php

namespace App\Http\Controllers;

use App\m_dataCV;
use App\m_pesanan;
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
        $get = m_pesanan::leftJoin('pembayaran','pesanan.id_pesan','=','pembayaran.id_pesanan')->leftJoin('pembangunan','pembayaran.id_pembayaran','=','pembangunan.pembayaran_id')->where('cv_id',$idnya)->get();
        // dd($get);
        return view('cv.v_rencanaPembangunanMasuk',['data'=>$get]);
    }

    public function updateRencanaPembangunan(Request $data){
        // dd($data['img']);
        $data->validate([
            'id' => 'required',
        ]);
        $id = $data['id'];
        m_rencanaPembangunan::where('id_bangun',$id)->update([
            'status_bangun' => $data['status'],
        ]);

        return redirect('cv/rencana-pembangunan-masuk');
    }
}
