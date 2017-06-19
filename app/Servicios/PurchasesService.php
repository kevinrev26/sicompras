<?php
/**
 *
 */
namespace App\Servicios;

use App\Modelos\Compra;
use App\Modelos\Oferta;

class PurchasesService
{

  function __construct()
  {
    # code...
  }

  public function filtrarPorDepartamento($tecnico)
  {
    $filtrados = array();
    $compras = Compra::all();
    foreach ($compras as $c) {
      if ( $c->orden->user->depto->institucion == $tecnico->depto->institucion) {
        array_push($filtrados, $c);
      }
    }
    //return $compras[0]->orden->user;
    return $filtrados;
  }

}
