<?php

namespace App\Http\Controllers;

use App\Customer;
use App\m_dataCustomer;
use App\m_dataCV;
use App\m_dataProduk;
use App\m_pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class c_formPesanan extends Controller
{
    public function beliDesignAction($id) {
        
        $get = m_dataProduk::join('cv_perencana','desain_rumah.cv_id','=','cv_perencana.id')->where('id_desain',$id)->get();
        // dd($get);
        return view('customer.v_formPesanan',['data'=>$get]);
    }

    public function beliCustomAction($id) {
        $get = m_dataCV::where('id',$id)->get();
        
        // $get = m_dataProduk::join('cv_perencana','desain_rumah.cv_id','=','cv_perencana.id')->where('cv_id',$id)->get();
        // dd($get);
        return view('customer.v_formPesanan',['data'=>$get]);
    }
    
    public function inputPesanan(Request $request){

        $id=$request['idDetail'];
        $getid = Auth()->User()->id;
        $idcus = m_dataCustomer::where('user_id',$getid)->get('id');

        foreach ($idcus as $li){
            $idnya = $li->id;
        }
        // dd( $request['idDetail']);

        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'email' => 'required',
            'produk' => 'required',
            'notlp' => 'required',
            'variasi' => 'required',
        ],[
            'nama.required' => 'Data harus diisi',
            'harga.required' => 'Data harus diisi',
            'email.required' => 'Data harus diisi',
            'produk.required' => 'Data harus diisi',
            'notlp.required' => 'Data harus diisi',
            'variasi.required' => 'Data harus diisi',
        ]);

        m_pesanan::create([
            'id_desain' => $request['idDetail'],
            'cv_id' => $request['idcv'],
            'customer_id' => $idnya,
            'nama_customer'  => $request['nama'],
            'harga_produk'  => $request['harga'],
            'email' => $request['email'],
            'nama_produk_design' => $request['produk'],
            'no_tlp' => $request['notlp'],
            'variasi' => $request['variasi'],
        ]);
        // return redirect()->route('seller/sms',[$id]);
        return redirect('/customer/pemesanan-design')->with('sukses' , 'Data berhasil disimpan');
        // return redirect('/detail/{{$id}}')->with('sukses', 'Data berhasil disimpan');
    }

    public function inputPesananCustom(Request $request){

        $id=$request['idcv'];
        $getid = Auth()->User()->id;
        $idcus = m_dataCustomer::where('user_id',$getid)->get('id');

        foreach ($idcus as $li){
            $idnya = $li->id;
        }
        // dd($request['idcv']);

        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'email' => 'required',
            'produk' => 'required',
            'notlp' => 'required',
            'luas' => 'required',
            'deskripsi' => 'required|max:255',
        ],[
            'nama.required' => 'Data harus diisi',
            'harga.required' => 'Data harus diisi',
            'email.required' => 'Data harus diisi',
            'produk.required' => 'Data harus diisi',
            'notlp.required' => 'Data harus diisi',
            'luas.required' => 'Data harus diisi',
            'deskripsi.required' => 'Data harus diisi',
        ]);

        m_pesanan::create([
            'cv_id' => $request['idcv'],
            'customer_id' => $idnya,
            'nama_customer'  => $request['nama'],
            'harga_produk'  => $request['harga'],
            'email' => $request['email'],
            'nama_produk_design' => $request['produk'],
            'no_tlp' => $request['notlp'],
            'luas' => $request['luas'],
            'deskripsi' => $request['deskripsi'],
        ]);
        // return redirect()->route('seller/sms',[$id]);
        return redirect('/customer/pemesanan-design')->with('sukses' , 'Data berhasil disimpan');
        // return redirect('/detail/{{$id}}')->with('sukses', 'Data berhasil disimpan');
    }

    public function batalAction(Request $request){

        $id = $request->id;
        //dd($request->all());
        // dd($id);
        // $produk = m_pesanan::find($id);
        m_pesanan::where('id_pesan',$id)->update([
            'batal' => $request->pembatalan
        ]);
        // dd($produk);
        
        // $produk->batal = $request->pembatalan;
        // $produk->save();

        return redirect('/customer/pemesanan-design')->with('batal', 'Data berhasil disimpan');
        
    }
}
