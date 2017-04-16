<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class CatalogoEquipo extends Model
{
    protected $table = 'catalogo_equipo';
    public $timestamps = false;

    public function solicitudes()
    {
      # code...
      return $this->belongsToMany('App\Modelos\Solicitud', 'detalle_solicitud','id_equipo', 'id_solicitud');
    }
}
