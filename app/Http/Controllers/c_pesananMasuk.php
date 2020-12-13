<?php

namespace App\Http\Controllers;

use App\m_dataCV;
use App\m_desainCustom;
use App\m_pesanan;
use Illuminate\Http\Request;

class c_pesananMasuk extends Controller
{
    public function pesananMasukAction()
   {
      $getid = Auth()->User()->id;
      $idcus = m_dataCV::where('user_id',$getid)->get('id');
      foreach ($idcus as $li){
         $idnya = $li->id;
     }
      // dd($idnya);
      $get = m_pesanan::leftJoin('desain_rumah','pesanan.id_desain','=','desain_rumah.id_desain')->where('pesanan.cv_id',$idnya)->get();
      // $get2 = m_desainCustom::where('cv_id',$idnya)->get();
      // dd($get);
   	return view('cv.v_pesananMasuk',['data'=>$get]);
   }

   public function updatePesanan(Request $request){

      $request->validate([
          'status' => 'required',
      ]);

      $id = $request->id;
      // dd($request->status);
      // dd($id);
      m_pesanan::where('id_pesan',$id)->update([
        'status' => $request->status
    ]);
    //   dd($produk);

      // $produk->status = $request->status;
      // $produk->save();

      return redirect('/cv/pesanan-masuk')->with('sukses', 'Data berhasil disimpan');
  }
}
