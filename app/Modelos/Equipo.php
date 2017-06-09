<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipo';
    public $timestamps = false;

    public function solicitudes()
    {
      # code...
      return $this->belongsToMany('App\Modelos\SolicitudMantenimiento', 'id_solicitud');
    }
}
