@extends('layouts.master')
@section('title','Publicar licitacion')

<style>
@media only screen and (max-width: 767px)  {
	h1 {
		font-size:22px !important;
	}
}
</style>

@section('content')


    @if (count($errors) > 0)
      <div class="alert alert-danger center">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="panel panel-default">
	
      <div class="panel-heading">
	  <h1 style="text-align:center; color:#3097d1;">Nuevo Contrato</h1>
      <br/>
	  </div>
	  
      <div class="panel-body">
	  
        <form class="form-horizontal" method="post" action="{{ url('/offers/'.$oferta->id.'/contracts') }}">
          {{ csrf_field() }}
		  
			<div class="form-group row">
			
			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
			</div>

			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
			
			  <label class="control-label col-sm-4" for="monto">Monto del contrato: <span class="asterisk">*</span></label>
			  <div class="col-sm-8">
			   <input type="text" class="form-control" id="monto" name="monto" placeholder="250.55" required>
			  </div>
            
              <label class="control-label col-sm-4" for="fecha">Fecha de ejecución: <span class="asterisk">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="fecha" placeholder="dd/MM/YYYY" required>
              </div>
            
              <label class="control-label col-sm-4" for="equipo">Equipo: <span class="asterisk">*</span></label>
              <select name="equipo">
			  	  <option disabled selected value> -- selecciona una opción -- </option>
                @foreach ($equipos as $equipo)
                  <option value="{{ $equipo->id_equipo}}">
                    {{ "Marca: " . $equipo->marca . ", inventario: " . $equipo->inv_equipo }}
                  </option>
                @endforeach
              </select>
			  
			</div>
			  
			<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
			</div>
            
			<input type="hidden" name="usuario" value="{{ Auth::id() }}" />
            <input type="hidden" name="proveedor" value="{{ $oferta->retail->id }}" />
			
		    <div class="form-group">
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
              <button type="submit" class="btn btn-success">Agregar Contrato</button>
             </div>
            </div>
			
        </form>
		
      </div>
	  
    </div>

@endsection
