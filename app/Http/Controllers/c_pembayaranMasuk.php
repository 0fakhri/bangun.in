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
        $get = m_pembayaran::join('pesanan','pembayaran.id_pesanan','=','pesanan.id_pesan')->where('cv_id',$idnya)->get();
        // dd($get);
        return view('cv.v_pembayaranMasuk',['data'=>$get]);
    }

    public function updatePembayaran(Request $request){

        $request->validate([
            'status' => 'required',
        ]);
  
        $id = $request->id;
        // dd($request->status);
        // dd($id);
        m_pembayaran::where('id_pembayaran',$id)->update([
            'status_bayar' => $request->status,
        ]);
        // $produk = m_pembayaran::where('id_pembayaran',$id)->get();
      //   dd($produk);
  
        // $produk->status = $request->status;
        // $produk->save();
  
        return redirect('/cv/pembayaran-masuk');
    }
}
