<?php

namespace App\Http\Controllers;

use App\m_dataProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class c_dataProduk extends Controller
{
    
    

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
