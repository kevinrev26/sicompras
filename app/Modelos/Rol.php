<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';

    public function users()
    {
      return $this->hasMany('App\User');
    }

    public function menus()
    {
      return $this->belongsToMany('App\Modelos\Menu', 'permiso', 'id_rol', 'id_menu');
    }
}
