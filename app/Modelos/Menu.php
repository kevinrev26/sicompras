<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table='menu';

    public function roles()
    {
      # code...
      return $this->belongsToMany('App\Modelos\Rol', 'permiso', 'id_menu', 'id_rol');
    }

}
