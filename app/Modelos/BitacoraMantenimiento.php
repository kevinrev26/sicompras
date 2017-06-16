<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class BitacoraMantenimiento extends Model
{
  protected $table = 'bitacora_mantenimiento';
  public $timestamps = false;



  public function employee()
  {
    return $this->belongsTo('App\Modelos\Empleado','empleado', 'id');
  }
}
