<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaldoCair extends Model
{
    protected $table = 'saldo_cair';
    protected $primaryKey = 'id';

    // public function pengguna(){
    //     return $this->belongsTo('App\Pengguna', 'id_pengguna');
    // }
}
