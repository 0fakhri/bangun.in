<?php

namespace App\Http\Controllers;

use App\m_dataProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class c_dataProduk extends Controller
{
    
    public function indexAdmin()
    {
        $data = m_dataProduk::all();
        // dd($data);
        return view('admin.data-produk',['produk'=>$data]);
    }

    public function indexCv()
    {
        $data = m_dataProduk::all();
        // dd($data);
        return view('cv.produk',['produk'=>$data]);
    }

    public function indexCustomer()
    {
        $data = m_dataProduk::all();
        // dd($data);
        return view('customer.produk',['produk'=>$data]);
    }

    public function editView($id)
    {
        $data = m_dataProduk::find($id);
        // dd($data);
        return view('cv.inputProduk',['produk'=>$data]);
    }

    public function createView()
    {
        return view('cv.inputProduk');
    }

    public function create(Request $data)
    {
        $data->validate([
            'nama' => 'required',
            'harga' => 'required',
            'img' => 'required',
        ],[
            'nama.required' => 'Mohon mengisi data dengan lengkap',
            'harga.required' => 'Mohon mengisi data dengan lengkap',
            'img.required' => 'Mohon mengisi data dengan lengkap',
        ]);
        
            
        $file = $data->file('img');
        $name = time();
        $extension = $file->getClientOriginalExtension();
        $newName = $name . '.' .$extension;
        // dd($newName);
        Storage::putFileAs('public/img', $data->file('img'), $newName);

        m_dataProduk::create([
            'cv_id' => '1',
            'nama_produk'  => $data['nama'],
            'harga'  => $data['harga'],
            'foto' => 'storage/img/' . $newName,
        ]);

        return redirect('/cv/data-produk');
    }

    public function updateProduk(Request $request){

        if($request->nama == null or $request->harga == null){
            return redirect('#')->with('status', 'Data harap diisi');
        }
        else{
            $id = $request->id;
            //dd($request->all());
            // dd($id);
            $produk = \App\m_dataProduk::find($id);
            // dd($produk->foto != null);
            
            if($produk->foto != null){
                Storage::delete($produk->foto);
            }

            $file = $request->file('img');
            $name = time();
            $extension = $file->getClientOriginalExtension();
            $newName = $name . '.' .$extension;
            // dd($newName);
            Storage::putFileAs('public/img', $request->file('img'), $newName);

            $produk->nama_produk = $request->nama;
            $produk->foto = 'storage/img/' . $newName;
            $produk->harga = $request->harga;
            $produk->save();

            return redirect('/cv/data-produk')->with('sukses', 'Data berhasil disimpan');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\m_dataProduk  $m_dataProduk
     * @return \Illuminate\Http\Response
     */
    public function show(m_dataProduk $m_dataProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\m_dataProduk  $m_dataProduk
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\m_dataProduk  $m_dataProduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, m_dataProduk $m_dataProduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\m_dataProduk  $m_dataProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(m_dataProduk $m_dataProduk)
    {
        //
    }
}
