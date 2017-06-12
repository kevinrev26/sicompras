<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $table = 'oferta';
    public $timestamps = false;

    public function bidding()
    {
      # code...
      return $this->belongsTo('App\Modelos\Licitacion','licitacion','id');
    }

    public function retail()
    {
      return $this->belongsTo('App\Modelos\Proveedor','proveedor','id');
    }
}
