<?php

namespace App\Http\Controllers;

use App\Customer;
use App\m_dataCustomer;
use App\m_pembayaran;
use Illuminate\Http\Request;

class c_pembayaranDesign extends Controller
{
    public function setPembayaran()
    {
        $getid = Auth()->User()->id;
        $idcus = m_dataCustomer::where('user_id',$getid)->get('id');
        foreach ($idcus as $li){
            $idnya = $li->id;
        }
        // dd($idnya);
        $get = m_pembayaran::leftjoin('pembangunan','pembayaran.id_pembayaran','=','pembangunan.pembayaran_id')->join('pesanan','pembayaran.id_pesanan','=','pesanan.id_pesan')->join('cv_perencana','pesanan.cv_id','=','cv_perencana.id')->where('customer_id',$idnya)->get();
        // dd($get);
        return view('customer.v_pembayaranDesign',['data'=>$get]);
    }

    public function invoice($id)
    {
        // $getid = Auth()->User()->id;
        // $idcus = Customer::where('user_id',$getid)->get('id');
        // foreach ($idcus as $li){
        //     $idnya = $li->id;
        // }
        // dd($idnya);
        $get = m_pembayaran::join('pesanan','pembayaran.id_pesanan','=','pesanan.id_pesan')->join('cv_perencana','pesanan.cv_id','=','cv_perencana.id')->leftJoin('desain_rumah','pesanan.id_desain','=','desain_rumah.id_desain')->where('id_pembayaran',$id)->get();
        // dd($get);
        return view('customer.invoice',['data'=>$get]);
    }
}
