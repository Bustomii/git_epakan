<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{

    protected $table = 'produk';

    public function pengguna(){
        return $this->belongsTo('App\Pengguna', 'id_pengguna');
    }
    public function keranjang(){
        return $this->hasMany('App\Keranjang', 'id');
    }
    public function detailPesanan(){
        return $this->hasMany('App\DetailPesanan', 'id');
    }
}
