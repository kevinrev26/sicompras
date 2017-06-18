@extends('layouts.master')
@section('title','Publicar licitacion')

@section('content')
  @if (!session('solicitudId'))
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
	<br/>
	<p class="alertass"><i style="color:rgba(210, 131, 30, 0.93);" class="fa fa-exclamation-triangle" aria-hidden="true"></i> ¡Al parecer no se ha aprobado alguna solicitud, dirígase a la página de <a href="/solicitude" >solicitudes</a> para aprobar una! </p>
	<br/>
	</div>
  @else

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
	
      <div class="panel-heading">Nueva licitación, {{ session('solicitudId')->user->depto->inst->nombre_institucion}}</div>
	  
      <div class="panel-body row">
	  
        <form class="form-horizontal" method="post" action="{{ url('/biddings') }}">
          {{ csrf_field() }}
		  
		  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
		  </div>
		  
          <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
		  
            <label class="control-label col-sm-4" for="nombre">Nombre de la convocatoria: <span class="asterisk">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Adquisicion de aires acondicionados">
				<br/>
              </div>
			
              <label class="control-label col-sm-4" for="objeto">Objeto: <span class="asterisk">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nombre" name="objeto"  required placeholder="Instalar aires en la planta baja">
				<br/>
              </div>
			
              <label class="control-label col-sm-4" for="informacion">Información adicional: <span class="asterisk">*</span></label>
              <div class="col-sm-8">
                <textarea class="form-control" name="informacion" required></textarea>
				<br/>
              </div>
			
              <label class="control-label col-sm-4" for="fuente">Fuente de financimamiento: <span class="asterisk">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nombre" name="fuente" placeholder="Fondos propios" required="">
				<br/>
              </div>
			
              <label class="control-label col-sm-4" for="tipo">Tipo de licitacion: <span class="asterisk">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nombre" name="tipo" placeholder="Libre gestión" required="">
				<br/>
              </div>
			  
          </div>
			
		  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
		  </div>
			
            <input type="hidden" name="usuario" value="{{ Auth::id() }}" />
            <input type="hidden" name="solicitud" value="{{ session('solicitudId')->id }}" />
            
		  <div class="form-group">
           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
              <button type="submit" class="btn btn-success">Agregar Licitación</button>
			  <br/>
           </div>
         </div>
			
        </form>
		
      </div>
	  
    </div>
	
  @endif
@endsection
