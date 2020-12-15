<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_dataCV extends Model
{
    public $timestamps = false;
    
    protected $table = 'cv_perencana';
    protected $fillable = [
        'user_id', 
        'nama_cv', 
        'alamat', 
        'status_akun', 
        'license', 
        'logo',
        'noTelp', 
        'deskripsi_cv', 
        'bank1', 
        'bank2', 
        'bank3',
        'norek1',
        'norek2',
        'norek3',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
