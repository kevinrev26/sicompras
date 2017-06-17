@extends('layouts.master')
@section('title','Publicar licitacion')

@section('content')


    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="panel panel-default">
      <div class="panel-heading">Nuevo contrato</div>
      <div class="panel-body">
        <form class="form-horizontal" method="post" action="{{ url('/offers/'.$oferta->id.'/contracts') }}">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="control-label col-sm-2" for="monto">Monto del contrato:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="monto" name="monto" required placeholder="250.55">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="fecha">Fecha de ejecución:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="fecha"  required placeholder="dd/MM/YYYY">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="equipo">Equipo:</label>
              <select name="equipo">
                @foreach ($equipos as $equipo)
                  <option value="{{ $equipo->id_equipo}}">
                    {{ "Marca: " . $equipo->marca . ", inventario: " . $equipo->inv_equipo }}
                  </option>
                @endforeach
              </select>
            </div>
            <input type="hidden" name="usuario" value="{{ Auth::id() }}" />
            <input type="hidden" name="proveedor" value="{{ $oferta->retail->id }}" />

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Agregar Contrato</button>
              </div>
            </div>
        </form>
      </div>
    </div>

@endsection
