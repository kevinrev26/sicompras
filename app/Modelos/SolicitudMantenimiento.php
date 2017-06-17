<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class SolicitudMantenimiento extends Model
{
    protected $table = 'solicitud_mantenimiento';
    public $timestamps = false;
    private $tipo = 'mantenimiento';


    public function equipos()
    {
      # code...
      return $this->belongsToMany('App\Modelos\Equipo', 'inv_equipo');
    }

    public function user()
    {
      return $this->belongsTo('App\User', 'usuario', 'id');
    }

    public function getTipo()
    {
      return $this->tipo;
    }
}
