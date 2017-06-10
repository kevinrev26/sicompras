<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class SolicitudMantenimiento extends Model
{
    protected $table = 'solicitud_mantenimiento';
    public $timestamps = false;


    public function equipos()
    {
      # code...
      return $this->belongsToMany('App\Modelos\Equipo', 'inv_equipo');
    }

    public function user()
    {
      return $this->belongsTo('App\User', 'usuario', 'id');
    }
}
