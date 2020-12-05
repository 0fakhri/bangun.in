<?php

namespace App\Http\Controllers;

use App\Customer;
use App\m_pembayaran;
use Illuminate\Http\Request;

class c_pembayaranDesign extends Controller
{
    public function setPembayaran()
    {
        $getid = Auth()->User()->id;
        $idcus = Customer::where('user_id',$getid)->get('id');
        foreach ($idcus as $li){
            $idnya = $li->id;
        }
        // dd($idnya);
        $get = m_pembayaran::join('pesanan','pembayaran.id_pesanan','=','pesanan.id')->where('customer_id',$idnya)->get();
        dd($get);
        return view('customer.v_pembayaranDesign',['data'=>$get]);
    }
}
