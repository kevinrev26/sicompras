<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class ContratoMantenimientoCorrectivo extends Model
{
  protected $table = 'contrato_matenimiento_correctivo';
  public $timestamps = false;

  public function equipment()
  {
    return $this->hasOne('App\Modelos\Equipo','equipo','id_equipo');
  }

  public function retail()
  {
    return $this->hasOne('App\Modelos\Proveedor','proveedor','id');
  }

}
