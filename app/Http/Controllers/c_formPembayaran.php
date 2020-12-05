<?php

namespace App\Http\Controllers;

use App\m_pembayaran;
use App\m_pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class c_formPembayaran extends Controller
{
    public function setFormPembayaran($id)
    {
        $data = m_pesanan::where('id',$id)->get();
        // dd($data);
        return view('customer.v_formPembayaran',['get'=>$data]);
    }
    // 'status'
    public function inputPembayaran(Request $data){
        // dd($data['id']);
        $data->validate([
            'id' => 'required',
            'bank' => 'required',
            'namaRek' => 'required',
            'noRek'  => 'required',
            'img'  => 'required|image',
        ]);
        
        $file = $data->file('img');
        $name = time();
        $extension = $file->getClientOriginalExtension();
        $newName = $name . '.' .$extension;
        // dd($newName);
        Storage::putFileAs('public/img', $data->file('img'), $newName);

        m_pembayaran::create([
            'id_pesanan' => $data['id'],
            'bank_tujuan'  => $data['bank'],
            'nama_rekening_pengirim'  => $data['namaRek'],
            'no_rek_pengirim'  => $data['noRek'],
            'bukti_pembayaran' => 'storage/img/' . $newName,
        ]);

        return redirect('/customer/pemesanan-design')->with('bayar', 'Data berhasil disimpan');
    }
}
