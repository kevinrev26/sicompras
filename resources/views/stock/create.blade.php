@extends('layouts.master')
@section('title', 'Agregar equipo')

<style>
@media only screen and (max-width: 767px)  {
	h1 {
		font-size:22px !important;
	}
}
</style>

@section('content')
  <h1 style="text-align:center; color:#3097d1;">Agregar un nuevo equipo</h1>
  <br/>
  @if (count($errors) > 0)
    <div class="alert alert-danger center">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form class="form-horizontal" method="POST" action="{{ url('/stockequipments') }}">
    {{ csrf_field() }}
    
	<div class="row">
	
	<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 center">
	</div>
	
	<div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 center">
	
      <label class="control-label col-sm-4" for="codigo">Código del equipo: <span class="asterisk">*</span></label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="01112254ab">
		<br/>
      </div>

 
    
      <label class="control-label col-sm-4" for="marca">Marca del equipo: <span class="asterisk">*</span></label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="marca" name="marca" placeholder="Panasonic">
		<br/>
      </div>
	  
   
      <label class="control-label col-sm-4" for="modelo">Modelo del equipo: <span class="asterisk">*</span></label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="modelo" name="modelo" placeholder="AV-115">
		<br/>
      </div>

      
      <label class="control-label col-sm-4" for="precio">Precio $: <span class="asterisk">*</span></label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="precio" name="precio" placeholder="250.55">
		<br/>
      </div>
      

      <label class="control-label col-sm-4" for="catalogo">Catalogo de equipo $: <span class="asterisk">*</span></label>
      <div class="col-sm-8">
        <select class="form-control" name="catalogo">
          @foreach ($catalogos as $catalogo)
              <option value="{{ $catalogo->id }}"> {{$catalogo->nombre_equipo}} </option>
          @endforeach
        </select>
		<br/>
      </div>
      <input type="hidden" name="departamento" value="{{ Auth::user()->depto->codigo_departamento }}" />
      
	
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
        <button type="submit" class="btn btn-success">Agregar nuevo equipo</button>
		<br/>
      </div>
	  
	</div>
	  
	<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 center">
	</div>
	  
    </div>
	
  </form>
@endsection
