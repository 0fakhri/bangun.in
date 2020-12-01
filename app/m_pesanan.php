<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_pesanan extends Model
{
    protected $table = 'pesanan';
    public $timestamps = false;
    
    protected $fillable = [
        'cv_id','customer_id','nama_customer','nama_produk_design','no_tlp','email','variasi','harga_produk','luas','deskripsi','foto','status','batal'
    ];
}
