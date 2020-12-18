<?php

namespace App\Http\Controllers;

use App\m_rencanaPembangunan;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class c_formPenolakan extends Controller
{
    public function setFormPenolakan($id)
    {   
        // dd($id);
        $data = m_rencanaPembangunan::where('id_bangun',$id)->get();
        // dd($data);
        return view('cv.v_formPenolakan',['get'=>$data]);
    }
    // 'status'
    public function updateRencanaPembangunan(Request $data){
        // dd($data['img']);
        $data->validate([
            'id' => 'required',
            'alasan' => 'required',
        ]);
        $id = $data['id'];
        // dd($id);
        m_rencanaPembangunan::where('id_bangun',$id)->update([
            'alasan_tolak' => $data['alasan'],
            'status_bangun' => $data['status'],
        ]);

        return redirect('cv/rencana-pembangunan-masuk')->with('tolak', 'Data berhasil disimpan');
    }
}
