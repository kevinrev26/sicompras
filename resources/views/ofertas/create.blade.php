@extends('layouts.master')
@section('title','Agregar una nueva oferta')
@section('content')
  @if (!session('id'))
    <div class="alert alert-warning">
      Parece que no se ha modificado ninguna solicitud.
    </div>
  @else
    <div class="panel panel-default">
      <div class="panel-heading">Agregar una nueva oferta.</div>
      <div class="panel-body">
        <form class="form-horizontal" method="post" action="{{ url('/offers') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="control-label col-sm-2" for="precio">Precio del equipo:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="precio" name="precio" required placeholder="545.80">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="descripcion">Descripcion de la oferta:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control"  name="descripcion" required placeholder="Detallar garantías y otras conveniencias">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="imagen">Subir una imagen:</label>
                  <div class="col-sm-10">
                    <input type="file" name="imagen">
                  </div>
                </div>
                <input type="hidden" name="licitacion" value="{{ session('id') }}" />
                <input type="hidden" name="proveedor" value="{{ Auth::guard('proveedor')->user()->id }}" />
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Agregar oferta</button>
                  </div>
                </div>
        </form>
      </div>
    </div>
  @endif

@endsection
