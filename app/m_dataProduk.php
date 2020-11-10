<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_dataProduk extends Model {   
    
    protected $table = 'desain_rumah';
    public $timestamps = false;
    
    protected $fillable = [
        'transaksi_id', 'cv_id', 'harga', 'nama_produk', 'foto'
    ];
}
