<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Departamento de sistemas</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

<!--Start of Zendesk Chat Script-->
    <script type="text/javascript">
        window.$zopim||(function(d,s){var z=$zopim=function(c){
            z._.push(c)},$=z.s=
                d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
        _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
            $.src='//v2.zopim.com/?4KoaWp6Z8KRqT3MSxhl6RbtIq529IYyR';z.t=+new Date;$.
                    type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
    </script>
    <!--End of Zendesk Chat Script-->

    {!! Html::style('css/bootstrap.min.css') !!}


</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Departamento de sistemas
                </a>
            </div>
            @if(Auth::guest())

            @else
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/') }}">Inicio</a></li>
                        <li><a href="{{ route('readUser') }}">Usuarios</a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Agregar<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('readArea') }}">Áreas</a></li>
                                <li><a href="{{ route('readEmployee') }}">Empleados</a></li>
                                <li><a href="{{ route('readDevice') }}">Dispositivos</a></li>
                                <li><a href="{{ route('readEquipments') }}">Equipos</a></li>
                                <!--
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Superusuario</li>
                                -->

                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administración<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('seeEmployeesDev') }}">Asignar dispositivos</a></li>
                                <li><a href="{{ route('seeEmployeesEq') }}">Asignar equipos</a></li>
                                <li><a href="#">Baja de activo</a></li>
                                <!--
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Superusuario</li>
                                -->

                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Servicios<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('seeAllRequests') }}">Hojas de servicios</a></li>
                                <li><a href="#">Recepción</a></li>
                                <!--
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Superusuario</li>
                                -->

                            </ul>
                        </li>

                    </ul>
            @endif

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Entrar</a></li>
                        <li><a href="{{ url('/register') }}">Registrarse</a></li>

                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Cerrar sesión</a></li>
                            </ul>
                        </li>

                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer
    <footer class="footer">
        <div class="container">
            <p class="text-muted">Sistemas e Informática JS3</p>
        </div>
    </footer>
    -->

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
