<?php

namespace App\Http\Controllers;

use App\Customer;
use App\m_dataCustomer;
use App\m_rencanaPembangunan;
use Illuminate\Http\Request;

class c_rencanaPembangunan extends Controller
{
    public function setRencanaPembangunan(){
        $getid = Auth()->User()->id;
        $idcus = m_dataCustomer::where('user_id',$getid)->get('id');
        foreach ($idcus as $li){
            $idnya = $li->id;
        }
        $get = m_rencanaPembangunan::join('pembayaran','pembangunan.pembayaran_id','=','pembayaran.id_pembayaran')->join('pesanan','pembayaran.id_pesanan','=','pesanan.id_pesan')->where('customer_id',$idnya)->get();
        // dd($get);
        return view('customer.v_rencanaPembangunan',['data'=>$get]);
    }
}
