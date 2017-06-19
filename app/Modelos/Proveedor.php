<?php

namespace App\Modelos;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Proveedor extends Authenticatable
{
    use Notifiable;

    protected $guard = 'proveedor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','nit', 'tipo_persona','representante', 'confiable'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'proveedor';

    public function role()
    {
      //return $this->belongsTo('App\Modelos\Rol', 'rol', 'id_rol');
      return $this->belongsTo('App\Modelos\Rol', 'rol', 'id');
    }


    public function getRoleSlug()
    {
      return $this->role->slug_rol;
    }
}
