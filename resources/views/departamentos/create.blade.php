@extends('layouts.master')

@section('title','Agregar un nuevo departamento')


@section('content')
  <h1>Nuevo departamento.</h1>
  @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif
  <form class="form-horizontal" method="POST" action="{{ url('/departments') }}">
    {{ csrf_field() }}
    <div class="form-group">
      <label class="control-label col-sm-2" for="codigo">Codigo de departamento:</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="codigo" name="codigo" placeholder="código">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nombre">Nombre de departamento:</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Recursos Humanos">
      </div>
    </div>
    @if (count($instituciones) > 0)
      <div class="form-group">
         <label class="col-sm-2 control-label">Institución</label>
         <div class="col-sm-10 selectContainer">
             <select class="form-control" name="institucion">

                 @foreach ($instituciones as $institucion )
                   <option value="{{ $institucion->id }}">
                      {{ $institucion->nombre_institucion }}
                   </option>
                 @endforeach
             </select>
         </div>
     </div>
    @else
      <div class="alert alert-danger">
        <h1>No hay instituciones registradas en el sistema</h1>
      </div>
    @endif


    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Agregar</button>
      </div>
    </div>
  </form>
@endsection
