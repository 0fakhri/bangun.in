<?php

namespace App\Http\Controllers;

use App\m_pembayaran;
use Illuminate\Http\Request;

class c_dataPembayaran extends Controller
{
    public function setPembayaran()
    {
        // $data = m_dataProduk::join();
        $data = m_pembayaran::join('pesanan','pembayaran.id_pesanan','=','pesanan.id')->get();
        // dd($data);
        return view('admin.v_dataPembayaran',['produk'=>$data]);
    }
}
