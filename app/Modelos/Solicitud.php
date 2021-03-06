<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitud';
    public $timestamps = false;
    private $tipo = 'compra';


    public function equipos()
    {
      # code...
      return $this->belongsToMany('App\Modelos\CatalogoEquipo', 'detalle_solicitud', 'id_solicitud', 'id_equipo')
      ->withPivot('cantidad');
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
