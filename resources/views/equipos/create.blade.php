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

  <form class="form-horizontal" method="POST" action="{{ url('/equipments') }}">
  
    {{ csrf_field() }}
	
	<div class="row">
	
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
	</div>
	
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      <label class="control-label col-sm-5" for="nombre">Nombre del equipo: <span class="asterisk">*</span></label>
      <div class="col-sm-7">
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Horno microondas">
		<br/>
      </div>
	
      <label class="control-label col-sm-5" for="descripcion">Descripción del equipo: <span class="asterisk">*</span></label>
      <div class="col-sm-7">
        <textarea class="form-control" name="descripcion" rows="2"></textarea>
		<br/>
      </div>
	
      <label class="control-label col-sm-5" for="unidad">Unidad de Potencia: <span class="asterisk">*</span></label>
      <div class="col-sm-7">
        <select class="form-control" name="unidad">
          <option value="BTU"> BTU </option>
          <option value="WATTS"> WATTS </option>
        </select>
		<br/>
      </div>
	
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
        <button type="submit" class="btn btn-success">Agregar nuevo equipo</button>
		<br/>
		<br/>
      </div>
    </div>
	
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
	</div>
	
	</div>
	
  </form>
@endsection
