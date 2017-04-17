<?php
/**
 *
 */
namespace App\Servicios;

use App\Modelos\Licitacion;

class BiddingsService
{

  function __construct()
  {
    # code...
  }

  public function filtrarPorInstitucion($user)
  {
    $filtrados = array();
    $licitaciones = Licitacion::all();
    foreach ($licitaciones as $l) {
      if ( $l->user->depto->institucion === $user->depto->institucion ) {
        array_push($filtrados, $l);
      }
    }
    return $filtrados;
  }

}
