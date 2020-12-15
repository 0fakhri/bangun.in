<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class m_dataCustomer extends Model
{
    use Notifiable;
    protected $table = 'customer';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'user_id', 'alamat', 'noTelp'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
