<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //
    protected $table = 'departamento';
    public $timestamps = false;

    public function getNombre()
    {
      return $this->nombre_departamento;
    }

    public function inst()
    {
      # code...
      return $this->belongsTo('App\Modelos\InstitucionGobierno','institucion');
    }


}
