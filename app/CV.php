<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CV extends Model
{
    public $timestamps = false;
    
    protected $table = 'cv_perencana';
    protected $fillable = [
        'user_id', 'nama_cv', 'alamat', 'status', 'sertifikat', 
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
