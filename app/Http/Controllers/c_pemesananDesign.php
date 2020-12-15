<?php

namespace App\Http\Controllers;

use App\Customer;
use App\m_dataCustomer;
use App\m_desainCustom;
use App\m_pesanan;
use Illuminate\Http\Request;

class c_pemesananDesign extends Controller
{
   public function pemesanandesignaction()
   {
      $getid = Auth()->User()->id;
      $idcus = m_dataCustomer::where('user_id',$getid)->get('id');
      foreach ($idcus as $li){
         $idnya = $li->id;
     }
      // dd($idnya);
      
      $get = m_pesanan::leftJoin('desain_rumah','pesanan.id_desain','=','desain_rumah.id_desain')->leftJoin('cv_perencana','pesanan.cv_id','=','cv_perencana.id')->leftJoin('pembayaran','pesanan.id_pesan','=','pembayaran.id_pesanan')->where('customer_id',$idnya)->get();
      // $get2 = m_desainCustom::where('customer_id',$idnya)->get();
      // dd($get);
   	return view('customer.v_pemesananDesign',['data'=>$get]);
   }

   
}
