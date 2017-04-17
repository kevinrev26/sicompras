@extends('layouts.master')
@section('title','Publicar licitacion')

@section('content')
  @if (!session('solicitudId'))
    <div class="alert alert-warning">
      <p>Al parecer no se ha aprobado alguna solicitud, dirígase a la pagina de <a href="/solicitude" >solicitudes</a> para aprobar una </p>
    </div>
  @else
    <h1>Agregar una nueva licitación.</h1>
  @endif
@endsection
