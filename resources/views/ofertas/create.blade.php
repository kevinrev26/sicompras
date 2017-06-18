@extends('layouts.master')
@section('title','Agregar una nueva oferta')

<style>
@media only screen and (max-width: 767px)  {
	h1 {
		font-size:22px !important;
	}
}
</style>

@section('content')

  @if (!session('id'))
	<div class="panel-body center">
        <p class="alertass"><i style="color:rgba(210, 131, 30, 0.93);" class="fa fa-exclamation-triangle" aria-hidden="true"></i> ¡Parece que no se ha modificado ninguna solicitud!</p>
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
	
      <div class="panel-heading">
	  <h1 style="text-align:center; color:#3097d1;">Agregar una nueva oferta</h1>
	  <br/>
	  </div>
	  
      <div class="row">
	  
        <form class="form-horizontal" method="post" action="{{ url('/offers') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
		  
		  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
		  </div>
		  
          <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
              
			  <label class="control-label col-sm-4" for="precio">Precio del equipo: <span class="asterisk">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="precio" name="precio" required placeholder="545.80">
				<br/>
              </div>
			
              <label class="control-label col-sm-4" for="descripcion">Descripcion de la oferta: <span class="asterisk">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control"  name="descripcion" required placeholder="Detallar garantías y otras conveniencias">
				  <br/>
                </div>	  

                <label class="control-label col-sm-4" for="imagen">Subir una imagen: <span class="asterisk">*</span><span class="asterisk">*</span></label>
                  <div class="col-sm-8">
                    <input type="file" name="imagen">
					<br/>
                  </div>
				
                <input type="hidden" name="licitacion" value="{{ session('id') }}" />
                <input type="hidden" name="proveedor" value="{{ Auth::guard('proveedor')->user()->id }}" />
				
				  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
				  <br/>
				  <button type="submit" class="btn btn-success">Agregar Oferta</button>
				  </div>

		  </div>
		  
		  <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
		  </div>
		  
        </form>
		
      </div>
  @endif

@endsection
