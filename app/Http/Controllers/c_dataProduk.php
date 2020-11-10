<?php

namespace App\Http\Controllers;

use App\m_dataProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class c_dataProduk extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCv()
    {
        $data = m_dataProduk::all();
        // dd($data);
        return view('cv.produk',['produk'=>$data]);
    }

    public function createView()
    {
        return view('cv.inputProduk');
    }

    public function create(Request $data)
    {
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

        


            


        

        // $user = new User($data);
        // $user_details = new User($data);
        // $user->save();
        // $user->user()->save($user_details);
        return redirect('/cv/data-produk');
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
    public function edit(m_dataProduk $m_dataProduk)
    {
        //
    }

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
