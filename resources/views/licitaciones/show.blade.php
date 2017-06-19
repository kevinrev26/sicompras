@extends('layouts.master')
@section('title', 'Detalle de licitacion')

<style>

label {
	font-weight:bold;
}

</style>

@section('content')

  @if (session('aplicada'))
    <div class="alert alert-warning center">
      {{ session('aplicada') }}
    </div>
  @endif
  
  <div class="row">
  
  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
  </div>
  
  <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
  
	  <label>Institucion: </label> {{ $licitacion->user->depto->inst->nombre_institucion }}
	  <label>Identificador: </label> {{ $licitacion->id }}
	  <label>Nombre de la convocatoria: </label> {{ $licitacion->nombre_convocatoria }}
	  <label>Tipo de convocatoria: </label> {{ $licitacion->tipo_licitacion }}
	  <label>Objeto: </label> {{ $licitacion->objeto }}
	  <label>Información adicional: </label> {{ $licitacion->informacion_adicional }}
	  <label>Oficina gestora: </label> {{ $licitacion->user->depto->nombre_departamento }}
	  <label>Nombre del contacto: </label> {{ $licitacion->user->name }}
	  <label>Fuente de financiamiento: </label> {{ $licitacion->fuente_financiamiento }}
	  <label>Identificador: </label> {{ $licitacion->id }}
	  <label>Estado de la convocatoria: </label> {{ $licitacion->estado }} 
	  <br/>
 
  </div>
  
  <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
  </div>
  
  @if (Auth::check())
    @if (Auth::user()->getRoleSlug() === 'uaci')
	  
     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
      <a href="{{ url('/biddings/'. $licitacion->id . '/offers') }}"><button class="btn btn-info">Ver ofertas</button></a>
	  <br/>
     </div>
	 
	  
    @endif
  @else
    @if (Auth::guard('proveedor')->check() && $licitacion->estado != 'FINALIZADA')
		
      <form method="post" action="{{ url('/biddings/'.$licitacion->id) }}">
        {{ csrf_field() }}
		
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
	    <br/>
		<button type="submit" class="btn btn-info">¡Aplicar a la licitacion!</button>
	    </div>
		
      </form>

    @endif
  @endif
  
  </div>

@endsection
