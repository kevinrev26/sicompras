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

  <h1 style="text-align:center; color:#3097d1;">Contratos Correctivos</h1>
  <br/>

    @if (count($contratos)>0)
		
      <div class="panel panel-default">

        <div class="panel-heading"><span style="color:#3097d1; text-align:center;">Listado de licitaciones</span><br/></div>
        <div class="panel-body" style="overflow-x:auto;">
          <table class="table">

            <thead>
              <tr style="color:#3097d1;">
                <th style="text-align:center;">Monto</th>
                <th style="text-align:center;">Fecha de ejecución</th>
                <th style="text-align:center;">Finalizado</th>
                <th style="text-align:center;">Equipo</th>
                <th style="text-align:center;">Proveedor</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($contratos as $contrato)
                <tr>
                  <td style="text-align:center;"> {{ $contrato->monto }} </td>
                  <td style="text-align:center;"> {{ $contrato->fecha_ejecucion }} </td>
                  <td style="text-align:center;"> {{ ($contrato->finalizado) ? "No" : "Si" }} </td>
                  <td style="text-align:center;"> {{ $contrato->equipment->inv_equipo }} </td>
                  <td style="text-align:center;"> {{ $contrato->retail->name }} </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
	  
    @else

		
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
		<br/>
		<p class="alertass"><i style="color:rgba(210, 131, 30, 0.93);" class="fa fa-exclamation-triangle" aria-hidden="true"></i>  No hay contratos que mostrar.</p>
		<br/>
		</div>
	  

    @endif


@endsection
