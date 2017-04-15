@extends('layouts.master')
@section('title', 'No encontrado')
@section('content')
  <div class="row">
       <div class="col-md-12">
           <div style="padding: 40px 15px;text-align: center;">
               <h1>
                   Oops!</h1>
               <h2>
                   404 No encontrado</h2>
               <div class="error-details">
                   La pagina solicitada no existe.
               </div>
               <div class="error-actions">
                   <a href="/" class="btn btn-primary btn-lg" style="margin-top:15px;margin-bottom:15px;"><span class="glyphicon glyphicon-home"></span>
                       Regresar al inicio </a>
               </div>
           </div>
       </div>
 </div>
@endsection
