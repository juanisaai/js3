@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        <div class="container">
            <div class="jumbotron">
                <h1>¡Oops! Tu sesión ha expirado</h1>
                <p>Por favor entra al sistema</p>
                <p><a class="btn btn-primary btn-lg" href="{{ url('/login') }}" role="button">Entrar</a></p>
            </div>
        </div>

    @else

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Resumen de dispositivos asignados
                        <p class="navbar-text navbar-right"><a href="{{ route('newAssign') }}" class="navbar-link">Crear <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></p>
                        </div>
                        <div class="panel-body table-hover table-striped table-responsive">

                            @include('partials/errors')
                            @include('partials/succeed')

                            <table class="table">
                                <tr>
                                    <th>Empleado</th>
                                    <th>Departamento</th>
                                    <th>Dispositivos</th>
                                    <th></th>
                                    <th>Acciones</th>
                                </tr>

                                @foreach($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->ProfileEmployee }} {{ $employee->FirstName }} {{ $employee->SecondName }}</td>
                                        <td>{{ $employee->Area->NameArea }}</td>
                                        <td>
                                            <ul>
                                                @foreach($employee->devices as $device)
                                                    <li>{{ $device->InventoryNumberDevice }}</li>
                                                @endforeach
                                            </ul>
                                        </td>

                                        <td>
                                            <a href="{{ route('seeDetailsAssignDev', ['id' => $employee->id]) }}">Ver detalles
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('deleteAssignDev', ['idDev' => $device->id]) }}">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection



