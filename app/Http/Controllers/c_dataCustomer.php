<?php

namespace App\Http\Controllers;

use App\m_dataCustomer;
use Illuminate\Http\Request;

class c_dataCustomer extends Controller
{
    public function setDataCustomer()
    {
        $get = m_dataCustomer::all();
        return view('admin.v_dataCustomer',['data'=>$get]);
    }
}
