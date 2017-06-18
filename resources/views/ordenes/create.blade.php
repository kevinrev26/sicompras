@extends('layouts.master')
@section('title','Crear nueva orden de compra')
@section('content')

  @if (!session('oferta'))

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
		<br/>
		<p class="alertass"><i style="color:rgba(210, 131, 30, 0.93);" class="fa fa-exclamation-triangle" aria-hidden="true"></i> ¡Parece que no se ha modificado ningúna oferta!</p>
		<br/>
	</div>

  @else
	  
    <div class="panel panel-default">
        <div class="panel-heading center">
          Agregar una nueva orden de compra. Fecha: {{ date('l F o') }}
        </div>
        <div class="panel-body">
          <form class="form-horizontal" method="post" action="{{ url('/purchaseorders') }}">
            {{ csrf_field() }}
            <input type="hidden" name="usuario" value="{{ Auth::user()->id }}"/>
            <input type="hidden" name="oferta" value="{{ session('oferta') }}" />
            <div class="form-group">
				<div class="col-sm-12 center">
					<button type="submit" class="btn btn-success">Agregar Oferta</button>
				</div>
			</div>
          </form>
		</div>
        </div>
    </div>
	
  @endif

@endsection
