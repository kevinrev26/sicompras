@extends('layouts.master')
@section('title', 'Detalle de licitacion')
@section('content')
  @if (session('aplicada'))
    <div class="alert alert-warning">
      {{ session('aplicada') }}
    </div>
  @endif
  <h3>Institucion: </h3> {{ $licitacion->user->depto->inst->nombre_institucion }}
  <h3>Identificador: </h3> {{ $licitacion->id }}
  <h3>Nombre de la convocatoria: </h3> {{ $licitacion->nombre_convocatoria }}
  <h3>Tipo de convocatoria: </h3> {{ $licitacion->tipo_licitacion }}
  <h3>Objeto: </h3> {{ $licitacion->objeto }}
  <h3>Información adicional: </h3> {{ $licitacion->informacion_adicional }}
  <h3>Oficina gestora: </h3> {{ $licitacion->user->depto->nombre_departamento }}
  <h3>Nombre del contacto: </h3> {{ $licitacion->user->name }}
  <h3>Fuente de financiamiento: </h3> {{ $licitacion->fuente_financiamiento }}
  <h3>Identificador: </h3> {{ $licitacion->id }}
  <h3>Estado de la convocatoria: </h3> {{ $licitacion->estado }} <br />
  @if (Auth::check())
    @if (Auth::user()->getRoleSlug() === 'uaci')
      <a href="{{ url('/biddings/'. $licitacion->id . '/offers') }}"> <button class="btn btn-info"> Revisar Ofertas </button></a>
    @endif
  @else
    @if (Auth::guard('proveedor')->check() && $licitacion->estado != 'FINALIZADA')
      <form method="post" action="{{ url('/biddings/'.$licitacion->id) }}">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-info"> Aplicar a la licitacion </button>
      </form>

    @endif
  @endif



@endsection
