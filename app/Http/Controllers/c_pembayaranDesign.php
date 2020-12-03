<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_pembayaranDesign extends Controller
{
    public function requestPembayaranDesign()
    {
        return view('customer.v_pembayaranDesign');
    }
}
