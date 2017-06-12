<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{

    //
    protected $table = 'orden_de_compra';
    public $timestamps = false;


    public function equipos()
    {
      return $this->belongsToMany('App\Modelos\CatalogoEquipo', 'detalle_compra', 'id_orden', 'id_equipo');
    }

    public function user()
    {
      return $this->belongsTo('App\User','usuario', 'id');
    }
}
