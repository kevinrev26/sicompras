<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
  protected $table = 'empleado';
  public $timestamps = false;


  public function retail()
  {
    return $this->belongsTo('App\Modelos\Proveedor', 'proveedor', 'id');
  }


}
