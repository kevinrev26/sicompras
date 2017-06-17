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

    public function solicitude()
    {
      return $this->user->solicitud;
    }


}
