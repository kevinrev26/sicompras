@extends('layouts.master')
@section('title','Catalogo de equipos')

<style>
@media only screen and (max-width: 767px)  {
	h1 {
		font-size:22px !important;
	}
}
</style>

@section('content')

  <h1 style="text-align:center; color:#3097d1;">Mis Empleados</h1>
  <br/>
  
  @if (session('message'))
    <div class="alert alert-success center">
      {{ session('message') }}
    </div>
  @endif


  <form class="form-inline" method="POST" action="{{ url('/employees') }}">
    {{ csrf_field() }}
	
    <div class="row">
	
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
		</div>
		
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
		  <label class="control-label col-sm-4" for="nombre">Nombre completo: <span class="asterisk">*</span></label>
		  <div class="col-sm-8">
			<input type="text" class="form-control" id="nombre" name="nombre" placeholder="IVAN PEDRO RAMIREZ CORDOVA" required>
		  </div>
		</div>
		
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
		</div>
	  
    </div>
    
	<input type="hidden" name="id" value="{{ Auth::guard('proveedor')->user()->id }}"/>
    
	<div class="form-group">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
             <button type="submit" class="btn btn-success">Agregar</button>
         </div>
    </div>
	
  </form>


  @if (count($empleados)>0)
	
    <div style="overflow-x:auto;">
    <table class="table">
      <thead>
        <tr style="color:#3097d1;">
          <th style="text-align:center;">Identificador</th>
          <th style="text-align:center;">Nombre</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($empleados as $empleado)
          <tr>
            <td style="text-align:center;">{{ $empleado->id }}</td>
            <td style="text-align:center;">{{ $empleado->nombre_completo }}</td>
            <td style="text-align:center;"> 
				<form action="{{url('employees/'.$empleado->id)}}" method="post">
				  {{ csrf_field() }}
				  <button type="submit" class="btn btn-danger" ><span class="glyphicon glyphicon-trash"></span></button>
				</form> 
			</td>
          </tr>
        @endforeach
      </tbody>
    </table>
	</div>
	
  @else
	
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
	<br/>
	<p class="alertass"><i style="color:rgba(210, 131, 30, 0.93);" class="fa fa-exclamation-triangle" aria-hidden="true"></i> <b>¡Oops!</b> Parece que no hay empleados que mostrar.</p>
	<br/>
	</div>
		
  @endif

@endsection
