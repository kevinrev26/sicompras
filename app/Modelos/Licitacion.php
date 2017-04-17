<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Licitacion extends Model
{
    //
    protected $table = 'licitacion';
    public $timestamps = false;

    public function user()
    {
      return $this->belongsTo('App\User','usuario','id');
    }
}
