<style>

li.dropdown>a{
	color:#3097d1 !important;
	font-weight:bold;
}

ul.dropdown-menu>li>a{
	color:#3097d1 !important;
	text-align:left;
}

</style>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><img alt="logo" src="{{ asset('images/logo.jpg') }}" width="100" height="auto"/></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      @if (Auth::check() || Auth::guard('proveedor')->check())
        <ul class="nav navbar-nav mnst">
        @if (Auth::guard('proveedor')->check())
          <li class="dropdown"> <a href="/biddings"> Licitaciones </a></li>
          <li class="dropdown"> <a href="/offers"> Ofertas realizadas </a> </li>
          <li> <a href="/{{Auth::guard('proveedor')->user()->id}}/employees">Mis empleados</a></li>
        @else {{--Check para proveedor--}}

            @if (count(Auth::user()->role->menus) > 0)
              @foreach (Auth::user()->role->menus as $menu)
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> {{$menu->nombre_menu}}  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    @foreach ($menu->items as $item)
                      <li> <a href="{{ $item->ruta }}"> {{$item->nombre_item}} </a> </li>
                    @endforeach
                  </ul>
                </li>
              @endforeach
            @else
              <li> <a href="/"> HOME </a></li>
            @endif {{-- count para User--}}

        @endif {{--proveedor--}}
          <li class="dropdown">
              @if (Auth::check())
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} - {{ date('l F o') }} <span class="caret"></span>
                </a>
              @else
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::guard('proveedor')->user()->name }} - {{ date('l F o') }} <span class="caret"></span>
                </a>
              @endif


              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="{{ url('/avanzada') }}">Opciones Avanzadas</a>
                </li>
                  <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Salir
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>

              </ul>
          </li>
        </ul>
      @else {{--check ||   --}}
        <ul class="nav navbar-nav navbar-right">
          <li> <a href="/login"> <span style="color:#3097d1; font-weight:bold;">Iniciar Sesión</span> </a> </li>
          <li> <a href="/register"> <span style="color:#3097d1; font-weight:bold;">Registrarse</span> </a> </li>
        </ul>
      @endif
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
