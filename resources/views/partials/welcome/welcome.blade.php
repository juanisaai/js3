<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="jumbotron">
                <h1>Bienvenido <small>{{ Auth::user()->name }}</small></h1>
                <p>Aquí tienes una lista de acciones de acceso rápido</p>
                <div class="list-group">

                    <a href="{{ route('newAssignEq') }}" class="list-group-item">Asignar equipo</a>
                    <a href="{{ route('newAssign') }}" class="list-group-item">Asignar dispositivo</a>
                    <a href="{{ route('createSerquest') }}" class="list-group-item">Crear nueva hoja de servicio</a>
                    <a href="{{ route('createRec') }}" class="list-group-item">Crear nueva recepción de equipo</a>
                    @can('Admin')
                        <a href="#" class="list-group-item">Crear nuevo dictamen de equipo</a>
                        <a href="#" class="list-group-item">Crear nuevo dictamen de dispositivo</a>
                        <a href="{{ route('createUser') }}" class="list-group-item">Crear nuevo usuario</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
