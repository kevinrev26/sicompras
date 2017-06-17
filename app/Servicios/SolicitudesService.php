<?php
/**
 *
 */
namespace App\Servicios;

use App\Modelos\Solicitud;
//use App\Modelos\Oferta;

class SolicitudesService
{

  function __construct()
  {
    # code..
  }

  public function filtrarSolicitudPorInstitucion($user)
  {
    $filtrados = array();
    $solicitudes = Solicitud::all();
    foreach ($solicitudes as $s) {
      if ( $s->user->depto->institucion === $user->depto->institucion ) {
        array_push($filtrados, $s);
      }
    }
    return $filtrados;
  }

  public function filtrarSolicitudPorTecnico($user)
  {
    $filtrados = array();
    $solicitudes = Solicitud::all();
    foreach ($solicitudes as $s) {
      if ( $s->user->id === $user->id ) {
        array_push($filtrados, $s);
      }
    }
    return $filtrados;
  }


}
