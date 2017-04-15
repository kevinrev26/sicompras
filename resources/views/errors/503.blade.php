@extends('layouts.master')
@section('title', 'Error interno')
@section('content')
  <div class="row">
         <div class="col-md-12">
             <div style="padding: 40px 15px;text-align: center;">
                 <h1>
                     Oops!</h1>
                 <h2>
                     503 Error de servidor</h2>
                 <div class="error-details">
                     Ha ocurrido un problema en el servidor, intentelo mas tarde.
                 </div>
                 <div class="error-actions">
                     <a href="/" class="btn btn-primary btn-lg" style="margin-top:15px;margin-bottom:15px;"><span class="glyphicon glyphicon-home"></span>
                         Regresar al inicio </a>
                 </div>
             </div>
         </div>
 </div>
@endsection
