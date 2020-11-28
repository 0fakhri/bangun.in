<?php

namespace App\Http\Controllers;

use App\Customer;
use App\m_desainCustom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class c_formDesignCustom extends Controller
{
    public function requestFormDesignAction()
   {
   	return view('customer.v_formDesignCustom');
   }

   public function requestFormDesignActionCv($id){

        $get = m_desainCustom::where('id',$id)->get();
        // dd($get);
        return view('cv.v_formDesignCustom',['data'=>$get]);
   }

   public function inputPesanan(Request $request){

        $getid = Auth()->User()->id;
        $idcus = Customer::where('user_id',$getid)->get();
        // dd($getid);
        foreach ($idcus as $li){
            $idnya = $li->id;
        }
        // dd($request['idcv']);

        $request->validate([
            'deskripsi' => 'required',
            
        ],[
            'deskripsi.required' => 'Data harus diisi',
            
        ]);

        m_desainCustom::create([
            'cv_id' => '1',
            'customer_id' => $idnya,
            'deskripsi'  => $request['deskripsi'],
        ]);
        // return redirect()->route('seller/sms',[$id]);
        return redirect('/customer/pemesanan-design')->with('sukses' , 'Data berhasil disimpan');
        // return redirect('/detail/{{$id}}')->with('sukses', 'Data berhasil disimpan');
    }

    public function updateDesain(Request $request){

        $request->validate([

            'img' => 'required',
        ]);

        $id = $request->id;
        //dd($request->all());
        // dd($id);
        $produk = m_desainCustom::find($id);
        // dd($produk);

        $file = $request->file('img');
        $name = time();
        $extension = $file->getClientOriginalExtension();
        $newName = $name . '.' .$extension;
        // dd($newName);
        Storage::putFileAs('public/img', $request->file('img'), $newName);

        $produk->foto = 'storage/img/' . $newName;
        // $produk->harga = $request->harga;
        $produk->save();

        return redirect('/cv/pesanan-masuk')->with('sukses', 'Data berhasil disimpan');
        
    }

    public function updateHarga(Request $request){

        $request->validate([
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);
        $id = $request->id;
        //dd($request->all());
        // dd($id);
        $produk = m_desainCustom::find($id);
        // dd($produk);
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->save();

        return redirect('/cv/pesanan-masuk')->with('sukses', 'Data berhasil disimpan');
    }

    
}
