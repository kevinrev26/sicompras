@extends('layouts.master')
@section('title', 'Crear solicitud')

<style>
@media only screen and (max-width: 767px)  {
	h1 {
		font-size:22px !important;
	}
}
</style>

@section('content')
  <div id="solicitudes" class="row">

	<div class="col-xs-12 col-sm-2 col-md-3 col-lg-3">
	</div>
	
    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
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
	  
      <form class="form-horizontal" method="post" action="{{ url('/solicitud') }} ">
        {{ csrf_field() }}

        <div class="form-group">
          <label class="control-label col-sm-4" for="id">Número de solicitud: <span class="asterisk">*</span></label>
          <div class="col-sm-8">
            <input type="number" class="form-control" name="id" min="1" max="10000" placeholder="{{ random_int(1,10000) }}" required>
          </div>
        </div>
		
        <div class="form-group">
          <label class="control-label col-sm-4" for="precio">Presupuesto estimado: <span class="asterisk">*</span></label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="presupuesto"  placeholder="100.45" required>
          </div>
        </div>
		
        <input type="hidden" name="usuario" value="{{ Auth::id() }}" />
        
		<div class="form-group">
          <label class="control-label col-sm-4 ">Equipo: <span class="asterisk">*</span></label>
          <div class="selectContainer col-sm-8 ">
		  
            @if (count($equipos)>0)
				
              <select name="equipos" v-model="equipo">
                  <option disabled selected value>Seleccione un equipo</option>
                @foreach ($equipos as $equipo)
                  <option value="{{ $equipo->inv_equipo }}"> {{$equipo->inv_equipo  }} </option>
                @endforeach
              </select>
			  
            @else
				
			  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
			  <br/>	
			  <p class="alertass"><i style="color:rgba(210, 131, 30, 0.93);" class="fa fa-exclamation-triangle" aria-hidden="true"></i> ¡No hay equipos agregados en este momento!</p>
			  <br/>
	          </div>
			  
            @endif
			
          </div>
        </div>
		
        <div class="form-group">
          <div class="col-sm-12 center">
            <button type="submit" class="btn btn-success">Agregar solicitud</button>
          </div>
        </div>
		<br/>

        <!-- <div class="panel panel-default">
          <div class="panel-heading">
            Equipos agregados a la solicitud
          </div>
          @if (count($equipos) > 0)
          <div class="panel-body">
            <p v-for="e in equipments">@{{ e.inv_equipo }} <span class="glyphicon glyphicon-remove"  v-on:click="removeEquip( e.id )" ></span>
              <input type="hidden" name="equipo" v-bind:value="e.inv_equipo"/>
            </p>
          </div>
          @else
          <div class="panel-body">
            <p >
              No hay equipos en el catalogo. No se puede crear la orden
            </p>
          </div>
          @endif
        </div>
        @if (count($equipos) > 0)
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Agregar solicitud</button>
          </div>
        </div>
        @else
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" disabled="true">Agregar solicitud</button>
          </div>
        </div>
        @endif -->
      </form>

    </div>
	
	<div class="col-xs-12 col-sm-2 col-md-3 col-lg-3">
	</div>

    <!-- <div class="col-md-4">
      <form class="form-horizontal" v-on:submit="addEquip">
        <div class="form-group">
          <label class="control-label col-md-4 ">Equipo</label>
          <div class="selectContainer col-md-6 ">
            @if (count($equipos)>0)
              <select v-model="equipo">
                  <option disabled value="">Seleccione un equipo</option>
                @foreach ($equipos as $equipo)
                  <option value="{{ $equipo->inv_equipo }}"> {{$equipo->inv_equipo  }} </option>
                @endforeach
              </select>

            @else
              <h2>No hay equipos agregados en este momento</h2>
            @endif
          </div>
        </div>
        @if (count($equipos) > 0)
        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-success">
                  Agregar equipos
              </button>
          </div>
        </div>
        @else
        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
              <button type="submit" class="btn btn-success" disabled="true">
                  Agregar equipos
              </button>
          </div>
        </div>
        @endif
      </form>
    </div> -->


  </div>


@endsection
@section('scripts')
  @parent
  <script src="js/mantenimiento.js"></script>

@endsection
