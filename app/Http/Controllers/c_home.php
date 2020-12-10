<?php

namespace App\Http\Controllers;

use App\m_dataCV;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class c_home extends Controller
{
    public function indexCv(){
        $getid = Auth()->User()->id;
        $get = m_dataCV::join('users','cv_perencana.user_id','=','users.id')->where('user_id',$getid)->get();
        // dd($get);
        return view('cv.home',['data'=>$get]);
    }

    public function indexCustomer(){
        return view('customer.home');
    }

    public function indexAdmin(){
        return view('admin.home');
    }

    public function formProfil(){
        $getid = Auth()->User()->id;
        $get = m_dataCV::join('users','cv_perencana.user_id','=','users.id')->where('user_id',$getid)->get();
        // dd($get);
        return view('cv.v_formProfil',['data'=>$get]);
    }

    public function updateProfil(Request $request){

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
            'namacv' => 'required',
            'alamat' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,svg',
            'email' => 'required',
            'notlp' => 'required',
            'deskripsi' => 'required',
            'bank1' => 'required',
            'norek1' => 'required',
            'bank2' => 'required',
            'norek2' => 'required',
            'bank3' => 'required',
            'norek3' => 'required',
        ]);

        

        $file = $request->file('img');
        $name = time();
        $extension = $file->getClientOriginalExtension();
        $newName = $name . '.' .$extension;
        // dd($newName);
        Storage::putFileAs('public/img', $request->file('img'), $newName);

        
        m_dataCV::where('user_id',$getid)->update([
            'nama_cv' => $request['namacv'],
            'alamat' => $request['alamat'],
            'logo' => 'storage/img/' . $newName,
            'noTelp'  => $request['notlp'],
            'deskripsi_cv'  => $request['deskripsi'],
            'bank1' => $request['bank1'],
            'norek1' => $request['norek1'],
            'bank2' => $request['bank2'],
            'norek2' => $request['norek2'],
            'bank3' => $request['bank3'],
            'norek3' => $request['norek3'],
        ]);

        User::where('id',$getid)->update([
            'email' => $request['email'],
        ]);

        // return redirect()->route('seller/sms',[$id]);
        return redirect('/cv/home')->with('sukses' , 'Data berhasil disimpan');
        // return redirect('/detail/{{$id}}')->with('sukses', 'Data berhasil disimpan');
    }

}
