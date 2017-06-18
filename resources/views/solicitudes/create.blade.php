@extends('layouts.master')
@section('title', 'Crear solicitud')
@section('content')

  <div id="solicitudes" class="row">
	
	<!-- 1ra Columna -->
	
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      
	  @if (count($errors) > 0)
        <div class="alert alert-danger center">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div> 
      @endif
	  
      <form class="form-horizontal" method="post" action="{{ url('/solicitude') }} " v-on:submit="checkEquip">
        {{ csrf_field() }}

        <div class="form-group">
          <label class="control-label col-sm-6" for="id">Numero de solicitud: <span class="asterisk">*</span></label>
          <div class="col-sm-6">
            <input type="number" class="form-control" name="id" min="1" max="10000" placeholder="{{ random_int(1,10000) }}" required>
          </div>
        </div>
		
        <div class="form-group">
          <label class="control-label col-sm-6" for="especificaciones">Especificaciones técnicas: <span class="asterisk">*</span></label>
          <div class="col-sm-6">
            <textarea class="form-control" name="especificaciones" rows="2" required></textarea>
          </div>
        </div>
		
        <div class="form-group">
          <label class="control-label col-sm-6" for="unidad">Unidad de medida: <span class="asterisk">*</span></label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="unidad" placeholder="Unidades/Yardas/etc." required>
          </div>
        </div>
		
        <div class="form-group">
          <label class="control-label col-sm-6" for="precio">Precio estimado: <span class="asterisk">*</span></label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="precio"  placeholder="100.45" required>
          </div>
        </div>
		
        <div class="form-group">
          <label class="control-label col-sm-6" for="forma">Forma de entrega: <span class="asterisk">*</span></label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="forma" placeholder="Presencial" required>
          </div>
        </div>
		
        <div class="form-group">
          <label class="control-label col-sm-6" for="lugar">Lugar de entrega: <span class="asterisk">*</span></label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="lugar" placeholder="En la institución" required>
          </div>
        </div>
		
        <div class="form-group">
          <label class="control-label col-sm-6" for="numero">Tipo de solicitud: <span class="asterisk">*</span></label>
          <div class="col-sm-6">
            <select class="form-control" name="tipo">
              @foreach ($tipos as $tipo)
                <option value="{{ $tipo->id }}">
                  {{ $tipo->nombre_solicitud }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
        <input type="hidden" name="usuario" value="{{ Auth::id() }}" />
        
		<div class="panel panel-default">
          <div class="panel-heading">
            <p class="center"><strong>Equipos agregados a la solicitud</strong></p>
          </div>
		  
          @if (count($equipos) > 0)
          <div class="panel-body">
            <p v-for="e in equipments">@{{ e.nombre}} <span style="color:red;" class="glyphicon glyphicon-remove"  v-on:click="removeEquip( e.id )" ></span>
              <input type="hidden" name="equipos[]" v-bind:value="e.id"/>
            </p>
          </div>
          @else
          <div class="panel-body">
            <p class="alertass"><i style="color:rgba(210, 131, 30, 0.93);" class="fa fa-exclamation-triangle" aria-hidden="true"></i> ¡No hay equipos en el catalogo. No se puede crear la orden!</p>
          </div>
          @endif
        </div>
        @if (count($equipos) > 0)
			
        <div class="form-group">
          <div class="col-sm-12 center">
            <button type="submit" class="btn btn-success">Agregar solicitud</button>
          </div>
        </div>
        @else
        <div class="form-group">
          <div class="col-sm-12 center">
            <button type="submit" class="btn btn-success" disabled="true">Agregar solicitud</button>
          </div>
        </div>
        @endif
      </form>

    </div>

	<!-- 2da Columna--> 
	
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
      <form class="form-horizontal" v-on:submit="addEquip">
        <div class="form-group">
          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><p style="text-align:right;">Equipo:</p></div>
          <div class="selectContainer col-xs-8 col-sm-8 col-md-8 col-lg-8">
            @if (count($equipos)>0)
              <select v-model="equipo">
                  <option disabled value="">Seleccione un equipo</option>
                @foreach ($equipos as $equipo)
                  <option value="{{ $equipo->id . '-' . $equipo->nombre_equipo }}"> {{$equipo->nombre_equipo  }} </option>
                @endforeach
              </select>

            @else
              <p class="alertass"><i style="color:rgba(210, 131, 30, 0.93);" class="fa fa-exclamation-triangle" aria-hidden="true"></i>  ¡No hay equipos agregados en este momento!</p>
            @endif
          </div>
        </div>
		
        @if (count($equipos) > 0)
        <div class="form-group">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
              <button type="submit" class="btn btn-success">
                  Agregar equipos
              </button>
          </div>
        </div>
        @else
        <div class="form-group">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
              <button type="submit" class="btn btn-success" disabled="true">
                  Agregar equipos
              </button>
          </div>
        </div>
        @endif
      </form>
    </div>


  </div>		
  <br/>
  <br/>


@endsection
@section('scripts')
  @parent
  <script src="js/solicitudes.js"></script>
@endsection
