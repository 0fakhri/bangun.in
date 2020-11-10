<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_home extends Controller
{
    public function indexCv(){
        return view('cv.home');
    }

    public function indexCustomer(){
        return view('customer.home');
    }

    public function indexAdmin(){
        return view('admin.home');
    }

}
