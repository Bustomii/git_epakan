<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestMitra extends Model
{

    protected $table = 'request_mitra';
    
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'nik',
    ];

    function Insertdata(){
        
        
    }
}
