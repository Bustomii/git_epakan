<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';
    protected $primaryKey = 'id_keranjang';

    public function pengguna(){
        return $this->belongsTo('App\Pengguna', 'id_pengguna');
    }
    public function produk(){
        return $this->belongsTo('App\Produk', 'id_produk');
    }
}
