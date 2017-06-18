@extends('layouts.master')

@section('title','Agregar un nuevo departamento')

<style>
@media only screen and (max-width: 767px)  {
	h1 {
		font-size:22px !important;
	}
}
</style>


@section('content')
  <h1 style="text-align:center; color:#3097d1; font-weight:bold;">Nuevo Departamento</h1>
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
  
  @if (session('message'))
    <div class="alert alert-success center">
      {{ session('message') }}
    </div>
  @endif
  
  <form class="form-horizontal" method="POST" action="{{ url('/departments') }}">
    {{ csrf_field() }}
	
    <div class="row">
	
	<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
	</div>
	
	<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
	
        <label class="control-label col-sm-4" for="codigo">Codigo de departamento: <span class="asterisk">*</span></label>
        <div class="col-sm-8">
        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="código">
		<br/>
        </div>
  
        <label class="control-label col-sm-4" for="nombre">Nombre de departamento: <span class="asterisk">*</span></label>
        <div class="col-sm-8">
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Recursos Humanos">
		<br/>
        </div>
	
    @if (count($instituciones) > 0)
		
         <label class="col-sm-4 control-label">Institución: <span class="asterisk">*</span></label>
         <div class="col-sm-8 selectContainer">
             <select class="form-control" name="institucion">

                 @foreach ($instituciones as $institucion )
                   <option value="{{ $institucion->id }}">
                      {{ $institucion->nombre_institucion }}
                   </option>
                 @endforeach
             </select>
			 <br/>
         </div>
		 
	</div>
	
	<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
	</div>
		 
    </div>
	 
    @else
	  
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
	<br/>
	<p class="alertass"><i style="color:rgba(210, 131, 30, 0.93);" class="fa fa-exclamation-triangle" aria-hidden="true"></i> <strong>¡No hay instituciones registradas en el sistema!</p>
	<br/>
	</div>
	  
    @endif

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
	  <button type="submit" class="btn btn-success">Agregar</button>
	  <br/>
	  <br/>
    </div>

  </form>
  
@endsection
