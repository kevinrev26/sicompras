@extends('layouts.master')
@section('title'," No. $solicitud->id")
@section('content')

<div class="container">


  <div class="row">
               <div class="col-md-8">
                 <h2>Solicitud No. {{ $solicitud->id }}</h2>
                <p> {{$solicitud->TipoSolicitud->nombre_solicitud}}</p>

                  <p><h4>Especificaciones de equipo solicitado</h4></p>
                  <p>Cantidad: {{ $solicitud->cantidad }} </p>
                  <p>Unidad de medida:  {{$solicitud->unidad_medida}}</p>
                 <p>Precio estimado {{$solicitud->precio_estimado}}</p>
                 <p><h4>Especificaciones de entrega</h4></p>
                 <p>Lugar de entrega {{$solicitud->lugar_entrega}}</p>
                 <p>Estado {{$solicitud->estado}}</p>

              </div>
              <div class="col-md-4">
                <div class="well">
                  <dl class="dl-horizontal">
                    <h4><b> Info Autor</b></h4>
                    <p>Nombre: {{ $solicitud->user->name }}</p>
                    <p>Email: {{ $solicitud->user->email }}</p>
                    <p>Institucion:  {{ $solicitud->user->depto->inst->nombre_institucion }}<p>
                    <p>Departamento: {{$solicitud->user->departamento}}</p>
                 </dl>
               </div>
             </div>
         </div>
</div>

@endsection
