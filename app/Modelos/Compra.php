<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compra';
    public $timestamps = false;


    public function retail()
    {
      return $this->hasOne('App\Modelos\Proveedor', 'id', 'proveedor');
    }

    public function orden()
    {
      return $this->hasOne('App\Modelos\OrdenCompra','id','orden_compra');
    }

}
