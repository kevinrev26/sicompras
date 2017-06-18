@extends('layouts.master')
@section('title'," No. $solicitud->id")

<style>
@media only screen and (max-width: 767px)  {
	h2 {
		font-size:22px !important;
	}
	.sol1 {
		padding:0px 0px 0px 0px;
	}
}

@media only screen and (min-width: 768px)  {
	.sol2 {
		padding-top:67px;
	}
}

@media only screen and (min-width: 1024px)  {
	.sol1 {
	padding:0px 120px 0px 120px;
	}
}

</style>

@section('content')

<div class="container">

  <div class="row">
  
               <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                 <h2 style="text-align:center; color:#3097d1;">Solicitud No. {{ $solicitud->id }}</h2>
                 <p><h4 style="text-align:center;">Especificaciones de equipo solicitado</h4></p>
				 <div class="sol1"> 
                 <p><b>Cantidad:</b> {{ $solicitud->cantidad }} </p>
                 <p><b>Unidad de medida:</b>  {{$solicitud->unidad_medida}}</p>
                 <p><b>Precio estimado:</b> {{$solicitud->precio_estimado}}</p>
				 <br/>
                 <p><h4 style="text-align:center;">Especificaciones de entrega</h4></p>
                 <p><b>Lugar de entrega:</b> {{$solicitud->lugar_entrega}}</p>
				 </div>	
                 @if (Auth::user()->getRoleSlug() === 'uaci')

                   @if($solicitud->estado===0)
                   <form action="{{url('/solicitude/'.$solicitud->id)}}" method="post">
                       {{ csrf_field() }}
					   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
					   <br/>
                       <button type="submit" class="btn btn-success">APROBAR</button>
					   <br/>
					   <br/>
					   </div>
                     </form>
                    @endif

                   @if($solicitud->estado===1)
					   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 center">
					   <br/>
                       <h4 style="text-align:center; font-weight:bold;">Estado: <span style="color:#3c763d;">Aprobada</span></h4>
					   <br/>
					   <br/>
					   </div>
                    @endif

                 @endif
              </div>
			  
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 sol2">
                <div class="well">
                  <dl class="dl-horizontal">
                    <h4><b> Info. Autor</b></h4>
                    <p><b>Nombre:</b> {{ $solicitud->user->name }}</p>
                    <p><b>Email:</b> {{ $solicitud->user->email }}</p>
                    <p><b>Institucion:</b>  {{ $solicitud->user->depto->inst->nombre_institucion }}<p>
                    <p><b>Departamento:</b> {{$solicitud->user->departamento}}</p>
                 </dl>
               </div>
             </div>
			 
         </div>
</div>

@endsection
