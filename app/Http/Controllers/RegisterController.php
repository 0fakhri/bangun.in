<?php

namespace App\Http\Controllers;

use App\Customer;
use App\m_dataCustomer;
use App\m_dataCV;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {

    protected function validator(array $data) {
        $dataValidator = [
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],

        ];
        return Validator::make($data, $dataValidator);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data) {
        // dd($data['notlp']);
        // dd($data['nama_cv']);
        // dd($data['alamatcv']);
        // dd($data['notlpcv']);
        // dd($data['img']);
        
        $data->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'notlp' => 'required',
            'email' => 'required',
            'password' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,svg',
        ]);

        $user =  User::create([
            'role'      => $data['role'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
        ]);

        if ($data['role'] == "customer") {
            m_dataCustomer::create([
                'user_id' => $user->id,
                'nama'    => $data['nama'],
                'alamat'  => $data['alamat'],
                'noTelp'  => $data['notlp'],
            ]);
        }
        elseif ($data['role'] == "cv") {

            $file = $data->file('img');
            $name = time();
            $extension = $file->getClientOriginalExtension();
            $newName = $name . '.' .$extension;
            // dd($newName);
            Storage::putFileAs('public/img', $data->file('img'), $newName);

            m_dataCV::create([
                'user_id' => $user->id,
                'nama_cv' => $data['nama'],
                'alamat'  => $data['alamat'],
                'noTelp'  => $data['notlp'],
                'license' => 'storage/img/' . $newName,
            ]);

        }

        // $user = new User($data);
        // $user_details = new User($data);
        // $user->save();
        // $user->user()->save($user_details);
        return redirect('/login')->with('daftar', 'mantab');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
