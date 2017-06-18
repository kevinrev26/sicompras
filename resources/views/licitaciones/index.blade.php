@extends('layouts.master')
@section('title', 'Licitaciones')

<style>
@media only screen and (max-width: 767px)  {
	h1 {
		font-size:22px !important;
	}
}
</style>

@section('content')
  @if (session('message'))
    <div class="alert alert-success center">
      {{ session('message') }}
    </div>
  @endif

  <div id="filtros" class="row">
    <form class="form-inline" method="GET" action="{{ url('/biddings/search') }}" >
	  
	  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 center">
        <label class="col-sm-4" for="id">Identificador (id): </label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="id" name="id" />
		</div>
		</br>
      </div>
	  
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 center">
        <label class="col-sm-4" for="titulo">Titulo: </label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="titulo" name="titulo" />
		</div>
      </div>
	  
	  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
	    <br/>
		<button type="submit" class="btn btn-default"><i style="color:;" class="fa fa-search" aria-hidden="true"></i> <b>Buscar</b></button>
		<br/>
	  </div>

    </form>
  </div>

  <h1 style="text-align:center; color:#3097d1;">Licitaciones</h1>
  <br/>
  
    @if (count($licitaciones)>0)
			
      <div class="panel panel-default" style="overflow-x:auto;">
        <div class="panel-heading"><span style="color:#3097d1; text-align:center;">Listado de licitaciones</span><br/></div>
        
		<div class="panel-body">
          <table class="table">
            <thead>
              <tr style="color:#3097d1;">
                <th style="text-align:center;">Institución</th>
                <th style="text-align:center;">Código</th>
                <th style="text-align:center;">Nombre de la convocatoria</th>
                <th style="text-align:center;">Objeto de la convocatoria</th>
                <th style="text-align:center;">Tipo de cotización</th>
                <th style="text-align:center;">Estado</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($licitaciones as $licitacion)
                <tr>
                  <td style="text-align:center;"> {{ $licitacion->user->depto->inst->nombre_institucion }} </td>
                  <td style="text-align:center;"> {{ $licitacion->id }} </td>
                  <td style="text-align:center;"> {{ $licitacion->nombre_convocatoria }} </td>
                  <td style="text-align:center;"> {{ $licitacion->objeto }} </td>
                  <td style="text-align:center;"> {{ $licitacion->tipo_licitacion }} </td>
                  <td style="text-align:center;"> {{ $licitacion->estado }} </td>
                  <td style="text-align:center;">
				  	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
						<a href="{{url('/biddings/'.$licitacion->id)}}">
						  <button class="btn btn-primary">Ver detalles</button>
						</a>
					</div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    @else
		
	  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
		<br/>
		<p class="alertass"><i style="color:rgba(210, 131, 30, 0.93);" class="fa fa-exclamation-triangle" aria-hidden="true"></i> ¡No hay licitaciones que mostrar!</p>
		<br/>
	  </div>
	  
    @endif


@endsection
