<?php

namespace App\Http\Controllers;

use App\Customer;
use App\m_pesanan;
use Illuminate\Http\Request;

class c_formDesignCustom extends Controller
{
    public function requestFormDesignAction()
   {
   	return view('customer.v_formDesignCustom');
   }

   public function inputPesanan(Request $request){

    $id=$request['idDetail'];
    $getid = Auth()->User()->id;
    $idcus = Customer::where('user_id',$getid)->get();

    foreach ($idcus as $li){
        $idnya = $li->id;
    }
    // dd($request['idcv']);

    $request->validate([
        'deskripsi' => 'required',
        
    ],[
        'deskripsi.required' => 'Data harus diisi',
        
    ]);

    ::create([
        'cv_id' => '1',
        'customer_id' => $idnya,
        'deskripsi'  => $request['deskripsi'],
    ]);
    // return redirect()->route('seller/sms',[$id]);
    return redirect('/customer/pemesanan-design')->with('sukses' , 'Data berhasil disimpan');
    // return redirect('/detail/{{$id}}')->with('sukses', 'Data berhasil disimpan');
}
}
