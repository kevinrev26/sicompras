<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = 'oferta';


    public function bidding()
    {
      # code...
      return $this->belongsTo('App\Modelos\Licitacion','licitacion','id');
    }

    public function retail($value='')
    {
      return $this->belongsTo('App\Modelos\Provedor','proveedor','id');
    }
}
