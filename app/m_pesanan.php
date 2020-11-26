<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_pesanan extends Model
{
    protected $table = 'pesanan';
    public $timestamps = false;
    
    protected $fillable = [
        'nama_customer','nama_produk_design','no_tlp','email','variasi_produk','harga_produk',
    ];
}
