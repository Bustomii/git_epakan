<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{

    protected $table = 'kabupaten';
    protected $primaryKey = 'id_kabupaten';

    public function kecamatan(){
        return $this->hasMany('App\Kecamatan', 'id_kabupaten');
    }

}
