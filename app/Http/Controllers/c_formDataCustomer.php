<?php

namespace App\Http\Controllers;

use App\m_dataCustomer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class c_formDataCustomer extends Controller
{
    public function setFormDataCustomer(){
        $getid = Auth()->User()->id;
        $get = m_dataCustomer::join('users','customer.user_id','=','users.id')->where('user_id',$getid)->get();
        // dd($get);
        return view('customer.v_formDataCustomer',['data'=>$get]);
    }

    public function updateDataCustomer(Request $request){

        $getid = Auth()->User()->id;
        // dd($getid);
        // $idcus = m_dataCV::where('user_id',$getid)->get('id');

        // dd($request['namacv']);
        // dd($request['alamat']);
        // dd($request['img']);
        // dd($request['email']);
        // dd($request['notlp']);
        // dd($request['deskripsi']);
        // dd($request['bank1']);
        // dd($request['bank2']);
        // dd($request['bank3']);
        // dd($request['norek1']);
        // dd($request['norek2']);
        // dd($request['norek3']);

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'notlp' => 'required',
        ]);

        
        m_dataCustomer::where('user_id',$getid)->update([
            'nama' => $request['nama'],
            'alamat' => $request['alamat'],
            'noTelp'  => $request['notlp'],
        ]);

        User::where('id',$getid)->update([
            'email' => $request['email'],
        ]);

        // return redirect()->route('seller/sms',[$id]);
        return redirect('/customer/home')->with('sukses' , 'Data berhasil disimpan');
        // return redirect('/detail/{{$id}}')->with('sukses', 'Data berhasil disimpan');
    }
}
