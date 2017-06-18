@extends('layouts.master')
@section('title','Ordenes de compra')

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
	<center>
      {{ session('message') }}
	</center>
    </div>
  @endif
  
   <h1 style="text-align:center; color:#3097d1;">Búsqueda de Ordenes de Compra</h1>
  <br/>

  <div id="filtros" class="row">
    <form class="form-inline" method="GET" action="{{ url('/purchaseorders/search') }}" >
	
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 center">
        <label for="fecha">Fecha: </label>
         <input type="text" class="form-control" id="fecha" name="fecha" />
		<br/>
      </div>
	  
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 center">
        <label for="id">Identificador (id): </label>
         <input type="text" class="form-control" id="id" name="id" />
      </div>
	  
	  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
	    <br/>
		<button type="submit" class="btn btn-default"><i style="color:;" class="fa fa-search" aria-hidden="true"></i> <b>Buscar</b></button>
		<br/>
		<br/>
	  </div>

    </form>
  </div>

@endsection
