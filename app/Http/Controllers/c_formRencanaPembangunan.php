<?php

namespace App\Http\Controllers;

use App\m_pembayaran;
use App\m_rencanaPembangunan;
use Illuminate\Http\Request;

class c_formRencanaPembangunan extends Controller
{
    public function setFormRencanaPembangunan($id){

        $get = m_pembayaran::leftJoin('pembangunan','pembayaran.id_pembayaran','=','pembangunan.pembayaran_id')->where('id_pembayaran',$id)->get();

        // $get2 = m_rencanaPembangunan::where('id_bangun',$id)->get();
        // dd($get);
        
        return view('customer.v_formRencanaPembangunan',['data'=>$get]);
    }

    public function inputRencanaPembangunan(Request $data){
        // dd($data['img']);
        $data->validate([
            'idBayar' => 'required',
            'tanggal' => 'required',
            'alamat' => 'required',
        ]);

        m_rencanaPembangunan::create([
            'pembayaran_id' => $data['idBayar'],
            'tanggal_survey'  => $data['tanggal'],
            'alamat_cod'  => $data['alamat'],
        ]);

        return redirect('/customer/pembayaran-design')->with('bangun', 'Data berhasil disimpan');
    }

    public function updateRencanaPembangunan(Request $data){
        // dd($data['img']);
        $data->validate([
            'id' => 'required',
            'tanggal' => 'required',
            'alamat' => 'required',
        ]);
        $id = $data->id;
        $status = null;
        m_rencanaPembangunan::where('id_bangun',$id)->update([
            'status_bangun' => $status,
            'alasan_tolak'  => $status,
            'tanggal_survey'  => $data['tanggal'],
            'alamat_cod'  => $data['alamat'],
        ]);

        return redirect('/customer/rencana-pembangunan')->with('ubah', 'Data berhasil disimpan');
    }
}
