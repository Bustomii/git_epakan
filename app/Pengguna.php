<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;
class Pengguna extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'pengguna';
    protected $guard = 'pengguna';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',	'nama',	'no_telp',	'token',	'alamat',	'daerah',	'foto',	'saldo',	'created_at',	'updated_at', 'email','password', 'status', 'kode_verifikasi',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function produk(){
        return $this->hasMany('App\Produk', 'id');
    }
    public function saldoCair(){
        return $this->hasMany('App\SaldoCair', 'id');
    }
    public function keranjang(){
        return $this->hasOne('App\Keranjang', 'id');
    }
    public function detailPesanan(){
      return $this->hasMany('App\DetailPesanan', 'id');
    }

}
