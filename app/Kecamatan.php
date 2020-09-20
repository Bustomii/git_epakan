<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{

    protected $table = 'kecamatan';
    protected $primaryKey = 'id_kecamatan';

    public function kabupaten(){
        return $this->belongsTo('App\Kabupaten', 'id_kabupaten');
    }

    public function ongkir(){
        return $this->hasMany('App\Ongkir', 'id_kecamatan');
    }

    
}
