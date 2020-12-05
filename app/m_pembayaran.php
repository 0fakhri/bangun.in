<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_pembayaran extends Model
{
    protected $table = 'pembayaran';
    public $timestamps = false;
    
    protected $fillable = [
        'id_pesanan','bank_tujuan','nama_rekening_pengirim','no_rek_pengirim','bukti_pembayaran','status'
    ];
}
