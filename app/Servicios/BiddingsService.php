<?php
/**
 *
 */
namespace App\Servicios;

use App\Modelos\Licitacion;
use App\Modelos\Oferta;

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

  public function checkRetail($idProveedor, $idLicitacion)
  {
    $aplicada = false;

    $ofertas = Oferta::where('licitacion', $idLicitacion)->get();
    foreach ($ofertas as $o) {
      if ( $o->retail->id === $idProveedor ) {
        $aplicada = true;
      }
    }

    return $aplicada;

  }

}
