@extends('layouts.master')
@section('title','Inicio')
@section('content')

	<!-- Styles --> 
    <link href="{{ asset('css/w3_slider.css') }}" rel="stylesheet">
	
    <div class="row">
        <div class="col-md-8 col-md-offset-2"> 
            <div class="panel panel-default">
                <div class="panel-heading"><center><span style="color:#3097d1; font-weight:bold;">¡BIENVENIDO!</span></center></div>
				
                <div class="panel-body">
                  <div class="w3-content w3-display-container"> 
					<img alt="" class="mySlides" src="{{ asset('images/slider1.jpg') }}" style="width: 100%;" />
					<img alt="" class="mySlides" src="{{ asset('images/slider2.jpg') }}" style="width: 100%;" />
					<img alt="" class="mySlides" src="{{ asset('images/slider3.jpg') }}" style="width: 100%;" />
					<img alt="" class="mySlides" src="{{ asset('images/slider4.jpg') }}" style="width: 100%;" />
					<img alt="" class="mySlides" src="{{ asset('images/slider5.jpg') }}" style="width: 100%;" />

					<!--<button class="w3-button w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
					<button class="w3-button w3-display-right" onclick="plusDivs(1)">&#10095;</button>-->
				  </div>
                </div>
				
            </div>
        </div>
    </div>

@endsection



<script>
window.onload = function(){
   setInterval('plusDivs(1)',2500); 
}

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>