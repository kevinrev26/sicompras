@extends('layouts.master')
@section('title', 'Licitaciones')

@section('content')
  @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif

  {{-- <div id="filtros">
    <form class="form-inline" method="GET" action="{{ url('/biddings/search') }}" >
      <div class="form-group">
        <label for="id">Identificador (id): </label>
        <input type="text" class="form-control" id="id" name="id" />

      </div>
      <div class="form-group">
        <label for="titulo">Titulo: </label>
        <input type="text" class="form-control" id="titulo" name="titulo" />
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search">Buscar</span></button>
      </div>

    </form>
  </div> --}}
  <div class="panel panel-default">
      <div class="panel-heading">
        Agregar un nuevo registro a la bitacora. Fecha: {{ date('l F o') }}
      </div>
      <div class="panel-body">
        <form id="empleados" class="form-horizontal" method="post" action="{{ url('/stocks/'.$equipo.'/binnacles') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="usuario" value="{{ Auth::user()->id }}"/>
          <input type="hidden" name="equipo" value="{{ $equipo }}" />
          <div class="form-group">
            <label class="control-label col-sm-2">Fecha en que se realizó: </label>
            <input name="fecha" type="date" placeholder="dd/MM/YYYY" required />
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">Descripción </label>
            <input name="descripcion" type="text" required />
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="imagen">Subir una imagen:</label>
              <div class="col-sm-10">
                <input type="file" name="imagen">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" >Tipo de Mantenimiento: </label>
                <div class="col-sm-10">
                  <select name="mantenimiento">
                    <option value="PREVENTIVO">Preventivo</option>
                    <option value="CORRECTIVO">Correctivo</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" >Proveedor: </label>
                  <div class="col-sm-10">
                    <select v-model="identificador">
                      @foreach ($proveedores as $proveedor)
                        <option value="{{ $proveedor->id }}" >
                          {{ $proveedor->name }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="imagen">Empleado: </label>
                  <div class="col-md-6 selectContainer">
                    <select class="form-control" name="empleado">
                      <option v-for="e in empleados" v-bind:value="e.id"> @{{ e.nombre_completo }} </option>
                    </select>
                  </div>
                </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Agregar registro</button>
              </div>
            </div>
        </form>
      </div>
  </div>

  <h1>Registro de bitacoras de mantenimiento.</h1>
    @if (count($bitacoras)>0)
      <div class="panel panel-default">
        <div class="panel-heading"> Listado de licitaciones.</div>
        <div class="panel-body">
          <table class="table table-stripped table-responsive" >
            <thead>
              <tr>
                <th> Fecha de Mantenimiento</th>
                <th> Descripción</th>
                <th> Imagen</th>
                <th> Realizada por</th>
                <th> Proveedor </th>
                <th>Tipo</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($bitacoras as $bitacora)
                <tr>
                  <td> {{ $bitacora->fecha_mantenimiento }} </td>
                  <td> {{ $bitacora->descripcion_mantenimiento }} </td>
                  <td> <img src="{{ asset($bitacora->imagen) }}"/></td>
                  <td> {{ $bitacora->employee->nombre_completo }} </td>
                  <td> {{ $bitacora->employee->name }} </td>
                  <td> {{ $bitacora->tipo_mantenimiento }} </td>
                  {{-- <td>
                    <a href="{{url('/biddings/'.$licitacion->id)}}">
                      <button class="btn btn-primary">Ver detalles</button>
                    </a>
                  </td> --}}
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    @else
      <div class="alert alert-warning">
        No hay bitacoras que mostrar.
      </div>
    @endif

    @section('scripts')
      @parent
      <script src=" {{ asset('js/bitacoras.js') }} " ></script>
    @endsection
@endsection
