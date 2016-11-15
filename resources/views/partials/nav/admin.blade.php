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

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('readUser') }}">Usuarios</a></li>

                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Superusuario</li>
                            <li><a href="{{ route('readAdmin') }}">Administrador</a></li>

                        </ul>
                    </li>

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

                        <!--<li><a href="{{ route('seeLowEq') }}">Baja de equipos</a></li>
                                <li><a href="{{ route('seeLowDev') }}">Baja de dispositivos</a></li>

                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Superusuario</li>
                                -->

                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Servicios<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('seeAllRequests') }}">Hojas de servicios</a></li>
                            <li><a href="{{ route('seeReceptions') }}">Recepción de equipos</a></li>
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
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('logout') }}"><i class="fa fa-btn fa-sign-out"></i>Cerrar sesión</a></li>
                            </ul>
                        </li>

                    @endif
                </ul>
            </div>
    </div>
</nav>

