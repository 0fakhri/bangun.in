<?php

namespace App\Http\Controllers;

use App\m_pesanan;
use Illuminate\Http\Request;

class c_formPenolakanPesanan extends Controller
{
    public function setFormPenolakan($id)
    {   
        // dd($id);
        $data = m_pesanan::where('id_pesan',$id)->get();
        // dd($data);
        return view('cv.v_formPenolakanPesanan',['get'=>$data]);
    }
    // 'status'
    public function updateRencanaPembangunan(Request $data){
        // dd($data['img']);
        $data->validate([
            'id' => 'required',
            'alasan' => 'required',
        ]);
        $id = $data['id'];
        // dd($id);
        m_pesanan::where('id_pesan',$id)->update([
            'alasan_ditolak' => $data['alasan'],
            'status' => $data['status'],
        ]);

        return redirect('cv/pesanan-masuk')->with('tolak', 'Data berhasil disimpan');
    }
}
