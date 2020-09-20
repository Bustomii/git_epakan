<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{

    protected $table = 'detail_pesanan';
    protected $primaryKey = 'id_detail';


    public function pesanan(){
        return $this->belongsTo('App\Pesanan', 'id_pesanan');
    }
    public function produk(){
        return $this->belongsTo('App\Produk', 'id_produk');
    }
    public function pembeli(){
      return $this->belongsTo('App\Pengguna', 'id_pembeli');
    }
    public function penjual(){
      return $this->belongsTo('App\Pengguna', 'id_penjual');
    }
}
