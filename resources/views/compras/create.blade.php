@extends('layouts.master')
@section('title','Agregar una nueva compra')

<style>
@media only screen and (max-width: 767px)  {
	h1 {
		font-size:22px !important;
	}
}
</style>

@section('content')

  <h1 style="text-align:center; color:#3097d1; font-weight:bold;">Nueva Compra</h1>
  <br/>
  
  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  
  <div class="row">
  <form class="form-horizontal" method="POST" action="{{ url('/purchases') }}">
    {{ csrf_field() }}
	
	<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
	</div>
	
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
	
      <label class="control-label col-sm-4" for="fecha">Fecha de compra:</label>
        <div class="col-sm-8">
        <input type="date" class="form-control" id="fecha" name="fecha" placeholder="22/12/2017">
		<br/>
      </div>
	
      <label class="control-label col-sm-4" for="orden">Número de Órden de compra:</label>
        <div class="col-sm-8">
        <input type="text" class="form-control" id="orden" name="orden" placeholder="25">
		<br/>
      </div>
	
    @if (count($proveedores) > 0)
		
         <label class="col-sm-4 control-label">Proveedor:</label>
         <div class="col-sm-8 selectContainer">
             <select class="form-control" name="proveedor">

                 @foreach ($proveedores as $proveedor )
                   <option value="{{ $proveedor->id }}">
                      {{ $proveedor->name }}
                   </option>
                 @endforeach
             </select>
			 <br/>
         </div>
	 
       <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
         <button type="submit" class="btn btn-success">Agregar</button>
		 <br/>
		 <br/>
       </div>
	</div>
	
    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
	</div>
	
    @else
	  
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
	<br/>
	<p class="alertass"><i style="color:rgba(210, 131, 30, 0.93);" class="fa fa-exclamation-triangle" aria-hidden="true"></i> ¡No hay proveedores en el sistema, no se puede agregar orden de compra!</p>
	<br/>
	</div>  
	
      <div class="alert alert-danger">
        <h1></h1>
      </div>
	  
    @endif

  </form>
  </div>
  
@endsection
