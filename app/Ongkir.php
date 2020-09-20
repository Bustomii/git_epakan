<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ongkir extends Model
{

    protected $table = 'ongkir';
    protected $primaryKey = 'id_ongkir';
    


    public function kecamatan(){
        return $this->belongsTo('App\Kecamatan', 'id_kecamatan', 'nama');
    }


}
