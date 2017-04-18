<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = 'oferta';


    public function licitacion()
    {
      # code...
      return $this->belongsTo('App\Modelos\Licitacion','licitacion','id');
    }
}
