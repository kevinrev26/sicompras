@extends('layouts.master')
@section('title','Publicar licitacion')

@section('content')
  @if (!session('solicitudId'))
    <div class="alert alert-warning">
      <p>Al parecer no se ha aprobado alguna solicitud, dirígase a la pagina de <a href="/solicitude" >solicitudes</a> para aprobar una </p>
    </div>
  @else

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
      <div class="panel-heading">Nueva licitación, {{ session('solicitudId')->user->depto->inst->nombre_institucion  }}</div>
      <div class="panel-body">
        <form class="form-horizontal" method="post" action="{{ url('/biddings') }}">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="control-label col-sm-2" for="nombre">Nombre de la convocatoria:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Adquisicion de aires acondicionados">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="objeto">Objeto:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" name="objeto"  required placeholder="Instalar aires en la planta baja">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="informacion">Información adicional:</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="informacion" required></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="fuente">Fuente de financimamiento:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" name="fuente" placeholder="Fondos propios" required="">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="tipo">Tipo de licitacion:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" name="tipo" placeholder="Libre gestión" required="">
              </div>
            </div>
            <input type="hidden" name="usuario" value="{{ Auth::id() }}" />
            <input type="hidden" name="solicitud" value="{{ session('solicitudId')->id }}" />
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Agregar licitacion</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  @endif
@endsection
