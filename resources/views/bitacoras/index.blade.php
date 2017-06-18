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

  {{-- <div id="filtros row">
  
    <form class="form-inline" method="GET" action="{{ url('/biddings/search') }}" >
	
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 center">
        <label for="id">Identificador (id): </label>
        <input type="text" class="form-control" id="id" name="id"/>
		<br/>
      </div>
	  
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 center">
        <label for="titulo">Titulo: </label>
        <input type="text" class="form-control" id="titulo" name="titulo"/>
		<br/>
      </div>
	  
	  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
	    <br/>
		<button type="submit" class="btn btn-default"><i style="color:;" class="fa fa-search" aria-hidden="true"></i> <b>Buscar</b></button>
		<br/>
		<br/>
	  </div>

    </form>
	
  </div> --}}
  
  <div class="panel panel-default">
      
	  <div class="panel-heading">
	  <h1 style="text-align:center; color:#3097d1;">Agregar un nuevo registro a la bitacora 
	  <br/> Fecha: {{ date('l F o') }} 
	  </h1>
      <br/>
	  </div>
      
	  <div class="panel-body row">
        
		<form id="empleados" class="form-horizontal" method="post" action="{{ url('/stocks/'.$equipo.'/binnacles') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
		  
          <input type="hidden" name="usuario" value="{{ Auth::user()->id }}"/>
          <input type="hidden" name="equipo" value="{{ $equipo }}" />
          
		  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
		  </div>
		  
		  <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
		  
            <label class="control-label col-sm-4">Fecha en que se realizó: <span class="asterisk">*</span></label>
			<div class="col-sm-8">
				<input name="fecha" type="date" placeholder="dd/MM/YYYY" required />
				<br/>
			</div>
          
            <label class="control-label col-sm-4">Descripción: <span class="asterisk">*</span></label>
			<div class="col-sm-8">
				<input name="descripcion" type="text" required />
				<br/>
			</div>
          
            <label class="control-label col-sm-4" for="imagen">Subir una imagen: <span class="asterisk">*</span></label>
            <div class="col-sm-8">
              <input type="file" name="imagen">
			  <br/>
            </div>
            
              <label class="control-label col-sm-4">Tipo de Mantenimiento: <span class="asterisk">*</span></label>
                <div class="col-sm-8">
                  <select name="mantenimiento">
				    <option disabled selected value> -- selecciona una opción -- </option>
                    <option value="PREVENTIVO">Preventivo</option>
                    <option value="CORRECTIVO">Correctivo</option>
                  </select>
				  <br/>
                </div>
              
                <label class="control-label col-sm-4">Proveedor: <span class="asterisk">*</span></label>
                  <div class="col-sm-8">
                    <select v-model="identificador">
					    <option disabled selected value> -- selecciona una opción -- </option>
                      @foreach ($proveedores as $proveedor)
                        <option value="{{ $proveedor->id }}" >
                          {{ $proveedor->name }}
                        </option>
                      @endforeach
                    </select>
					<br/>
                  </div>
                
                  <label class="control-label col-sm-4" for="imagen">Empleado: <span class="asterisk">*</span></label>
                  <div class="col-md-8 selectContainer">
                    <select class="form-control" name="empleado">
					  <option disabled selected value> -- selecciona una opción -- </option>
                      <option v-for="e in empleados" v-bind:value="e.id"> @{{ e.nombre_completo }} </option>
                    </select>
					<br/>
                  </div>
                </div>
				
		  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
		  </div>

		<div class="form-group">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
              <button type="submit" class="btn btn-success">Agregar Registro</button>
			  </br>
          </div>
        </div>
			
        </form>
		
      </div>
	  
  </div>
  
  <h1 style="text-align:center; color:#3097d1;">Registro de bitacoras de mantenimiento</h1>
  <br/>

    @if (count($bitacoras)>0)
      <div class="panel panel-default">
        <div class="panel-heading"><span style="color:#3097d1; text-align:center;">Listado de licitaciones</span></div>
        
		<div class="panel-body" style="overflow-x:auto;">
          <table class="table">
            <thead>
              <tr style="color:#3097d1;">
                <th style="text-align:center;">Fecha de Mantenimiento</th>
                <th style="text-align:center;">Descripción</th>
                <th style="text-align:center;">Imagen</th>
                <th style="text-align:center;">Realizada por</th>
                <th style="text-align:center;">Proveedor </th>
                <th style="text-align:center;">Tipo</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($bitacoras as $bitacora)
                <tr>
                  <td style="text-align:center;"> {{ $bitacora->fecha_mantenimiento }} </td>
                  <td style="text-align:center;"> {{ $bitacora->descripcion_mantenimiento }} </td>
                  <td style="text-align:center;"> <img src="{{ asset($bitacora->imagen) }}"/></td>
                  <td style="text-align:center;"> {{ $bitacora->employee->nombre_completo }} </td>
                  <td style="text-align:center;"> {{ $bitacora->employee->name }} </td>
                  <td style="text-align:center;"> {{ $bitacora->tipo_mantenimiento }} </td>
                  {{-- <td style="text-align:center;">
                    <a href="{{url('/biddings/'.$licitacion->id)}}">
                      <button class="btn btn-primary">¡Ver detalles!</button>
                    </a>
                  </td> --}}
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    @else
		
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
		<br/>
		<p class="alertass"><i style="color:rgba(210, 131, 30, 0.93);" class="fa fa-exclamation-triangle" aria-hidden="true"></i> ¡No hay bitacoras que mostrar!</p>
		<br/>
		</div>

    @endif

    @section('scripts')
      @parent
      <script src=" {{ asset('js/bitacoras.js') }} " ></script>
    @endsection
@endsection
