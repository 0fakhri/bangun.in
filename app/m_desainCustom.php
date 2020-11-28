<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_desainCustom extends Model
{
    protected $table = 'kustom_desain';
    public $timestamps = false;
    
    protected $fillable = [
        'cv_id','customer_id','deskripsi','harga','foto',
    ];
}
