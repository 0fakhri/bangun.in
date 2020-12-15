<?php

namespace App\Http\Controllers;

use App\m_dataCV;
use Illuminate\Http\Request;

class c_dataCv extends Controller
{
    public function setDataCv()
    {
        $get = m_dataCV::all();
        return view('admin.v_dataCv',['data'=>$get]);
    }

    public function updateDataCv(Request $request){

        $request->validate([
            'status' => 'required',
        ]);
  
        $id = $request->id;
        // dd($request->status);
        // dd($id);
        m_dataCV::where('id',$id)->update([
          'status_akun' => $request->status
      ]);
      //   dd($produk);
  
        // $produk->status = $request->status;
        // $produk->save();
  
        return redirect('/admin/data-cv')->with('sukses', 'Data berhasil disimpan');
    }
}
