<?php

namespace App\Http\Controllers;

use App\m_dataCV;
use App\m_dataProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class c_designRumah extends Controller
{
    // public function klikMenuMitra($id) {
        
    //     $data = m_dataProduk::join('alamat','ca_farmer.id_alamat','=','alamat.id_alamat')->where('id_petani',$id)->get();
    //     // dd($data);
    //     return view('investor.v_detail_mitra',['mitra'=>$data]);
    // }

    public function indexAdmin()
    {
        // $data = m_dataProduk::join();
        $data = m_dataCV::join('desain_rumah','cv_perencana.id','=','desain_rumah.cv_id')->get();
        // dd($data);
        return view('admin.data-produk',['produk'=>$data]);
    }

    public function indexCv()
    {
        $id = Auth()->User()->id;
        $idcv = m_dataCV::where('user_id',$id)->first();

        $data = m_dataProduk::where('cv_id',$idcv->id)->get();
        // dd($data);
        return view('cv.v_designRumah',['produk'=>$data]);
    }

    public function indexCustomer()
    {
        // $data = m_dataProduk::join('cv_perencana','desain_rumah.cv_id','=','cv_perencana.id')->get();
        // dd($data);
        $data = m_dataCV::all();
        // dd($data);
        return view('customer.v_designRumah',['produk'=>$data]);
    }

    public function editView($id)
    {
        $data = m_dataProduk::where('id_desain',$id)->get();
        // dd($data);
        return view('cv.editProduk',['produk'=>$data]);
    }

    public function createView()
    {
        $data = m_dataProduk::all();
        // dd($data);
        return view('cv.inputProduk',['produk'=>$data]);
    }

    public function create(Request $data)
    {
        $data->validate([
            'nama' => 'required',
            'harga' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,svg',
        ],[
            'nama.required' => 'Mohon mengisi data dengan lengkap',
            'harga.required' => 'Mohon mengisi data dengan lengkap',
            'img.required' => 'Mohon mengisi data dengan lengkap',
        ]);
        
        $id = Auth()->User()->id;
        $idcv = m_dataCV::where('user_id',$id)->first();

        $file = $data->file('img');
        $name = time();
        $extension = $file->getClientOriginalExtension();
        $newName = $name . '.' .$extension;
        // dd($newName);
        Storage::putFileAs('public/img', $data->file('img'), $newName);

        m_dataProduk::create([
            'cv_id' => $idcv->id,
            'nama_produk'  => $data['nama'],
            'harga'  => $data['harga'],
            'foto' => 'storage/img/' . $newName,
        ]);

        return redirect('/cv/data-produk')->with('eror', 'Data berhasil disimpan');
    }

    public function updateProduk(Request $request){

        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,svg',
        ],[
            'nama.required' => 'Mohon mengisi data dengan lengkap',
            'harga.required' => 'Mohon mengisi data dengan lengkap',
        ]);

        if($request->nama == null or $request->harga == null){
            return redirect('#')->with('status', 'Data harap diisi');
        }
        else{
            $id = $request->id;
            //dd($request->all());
            // dd($id);
            
            $file = $request->file('img');
            $name = time();

            if($file != null){
                $extension = $file->getClientOriginalExtension();
                $newName = $name . '.' .$extension;
                // dd($newName);
                Storage::putFileAs('public/img', $request->file('img'), $newName);

            
                m_dataProduk::where('id_desain',$id)->update([
                    'nama_produk' => $request->nama,
                    'foto' => 'storage/img/' . $newName,
                    'harga' => $request->harga,
                ]);
            }
            elseif($file == null){
                m_dataProduk::where('id_desain',$id)->update([
                    'nama_produk' => $request->nama,
                    'harga' => $request->harga,
                ]);
            }
            // $file = $request->file('img');
            // $name = time();
            // $extension = $file->getClientOriginalExtension();
            // $newName = $name . '.' .$extension;
            // // dd($newName);
            // Storage::putFileAs('public/img', $request->file('img'), $newName);

            // $produk->nama_produk = $request->nama;
            // $produk->foto = 'storage/img/' . $newName;
            // $produk->harga = $request->harga;
            // $produk->save();

            return redirect('/cv/data-produk')->with('sukses', 'Data berhasil disimpan');
        }
    }
}
