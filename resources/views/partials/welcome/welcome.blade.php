<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="jumbotron">
                <h1>Bienvenido <small>{{ Auth::user()->name }}</small></h1>

                @if((Auth::user()->name) === 'Admin')
                    <div class="alert alert-warning" role="alert"><p>Por favor considera cambiar tus datos de administrador</p></div>
                @elseif((Auth::user()->username) === 'admin')
                    <div class="alert alert-warning" role="alert"><p>Al parecer no has cambiado todos tus datos, por favor considera cambiar tus datos de administrador</p></div>
                @endif
                <p>Aquí tienes una lista de acciones de acceso rápido</p>
                <div class="list-group">

                    <a href="{{ route('newAssignEq') }}" class="list-group-item">Asignar equipo</a>
                    <a href="{{ route('newAssign') }}" class="list-group-item">Asignar dispositivo</a>
                    <a href="{{ route('createSerquest') }}" class="list-group-item">Crear nueva hoja de servicio</a>
                    <a href="{{ route('createRec') }}" class="list-group-item">Crear nueva recepción de equipo</a>
                    <a href="{{ route('createDictumEq') }}" class="list-group-item">Crear nuevo dictamen de equipo</a>
                    <a href="{{ route('createDictumDev') }}" class="list-group-item">Crear nuevo dictamen de dispositivo</a>
                @can('Admin')
                        <a href="{{ route('createUser') }}" class="list-group-item">Crear nuevo usuario</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
