<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_rencanaPembangunan extends Model
{
    protected $table = 'pembangunan';
    public $timestamps = false;
    
    protected $fillable = [
        'pembayaran_id', 'tanggal_survey', 'alamat_cod','alasan_tolak','status_bangun'
    ];
}
