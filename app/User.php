<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','departamento'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
      //return $this->belongsTo('App\Modelos\Rol', 'rol', 'id_rol');
      return $this->belongsTo('App\Modelos\Rol', 'rol', 'id');
    }

    public function depto()
    {
      # code...
      return $this->belongsTo('App\Modelos\Departamento', 'departamento' ,'codigo_departamento');
    }

    public function getRoleSlug()
    {
      return $this->role->slug_rol;
    }
}
