<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    // public function dataart(Request $request){
    //     if ($request->has('cari')){
    //         $data_art = \App\art::where('name', 'LIKE', '%' 
    //         .$request->cari. '%')->get();
    //     }else{
    //         $data_art = \App\art::all();
    //     }
    //     return view('admin.dataart',['data_art' => $data_art]);
    // }

    public function dataUser(Request $request)
    {
        $admin = \App\User::all();
    }

    // public function datamaster(Request $request){
    //     $data_master = \App\master::all();
    //     return view('admin.datamaster',['data_master' => $data_master]);
    // }

    public function dashboard (){
       return view ('/admin.dashboard');
    }

    // public function create(Request $request){
    //     $art=\App\art::create($request->all());
    //     $user = \App\User::create($request->all());
    //     $user->name= $request->name;
    //     $user->username= $request->username;
    //     $user->email=$request->email;
    //     $user->password = bcrypt($user->password);
    //     $user->remember_token = str_random(60);
    //     $user->save();
    //      if ($request->hasFile('foto')) {
    //         $request->file('foto')->move('images', $request->file('foto')->getClientOriginalName());
    //         $art->foto = $request->file('foto')->getClientOriginalName();
    //         $art->save();
    //     }
    //     return redirect('/dataart')->with('sukses','data berhasil ditambahkan');
    // }

    // public function edit($id){
    //     $art = \App\art::find($id);
    //     return view('admin.edit', ['art' => $art]);
    // }

    public function editadmin($id){
        $users = \App\User::find($id);
        return view('admin.editadmin', ['users' => $users]);
    }

    // public function update(Request $request, $id){
    //     //dd($request->all());
    //     $art = \App\art::find($id);
    //     $art->update($request->all());
    //     $user = \App\user::find($id);
    //     $user->update($request->all());
    //     if ($request->hasFile('foto')) {
    //         $request->file('foto')->move('images', $request->file('foto')->getClientOriginalName());
    //         $art->foto = $request->file('foto')->getClientOriginalName();
    //         $art->update($request->all());
    //         $art->save($request->all());
    //     }
    //     return redirect('/dataart')->with('sukses', 'data berhasil diubah');
    // }

    public function updateadmin(Request $request, $id){
        //dd($request->all());
        $users = \App\User::find($id);
        //$users->password = bcrypt($users->password);
        $users->update($request->all());
        return redirect('/dataku/{id}')->with('sukses', 'data berhasil diubah');
    }

    // public function profilart($id){
    //     $art = \App\art::find($id);
    //     return view('admin.profile', ['art' => $art]);

    // }
    //   public function profilmaster($id){
    //     $master = \App\master::find($id);
       
    //     return view('admin.profilemaster', ['master' => $master]);

    // }

    public function profiladmin($id){
        //$admin = \App\admin::find($id);
        //dd($request->all());
       return view('admin.profileadmin');
    }
}