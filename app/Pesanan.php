<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    public $incrementing = false;
    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';

    public function detailPesanan(){
        return $this->hasMany('App\DetailPesanan', 'id_pesanan');
    }
}
