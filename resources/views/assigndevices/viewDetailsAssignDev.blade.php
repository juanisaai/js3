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
                        <div class="panel-heading">
                            <p class="navbar-text navbar-right"><a href="{{ route('newAssignDet', ['idEmp' => $employee->id]) }}" class="navbar-link">Crear <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></p>
                            <h3 class="panel-title">Empleado: {{ $employee->ProfileEmployee }} {{ $employee->FirstName }} {{ $employee->SecondName }}</h3>
                            <h4 class="panel-title">Departamento: {{$employee->Area->NameArea}}</h4>
                        </div>
                        <div class="panel-body table-hover table-striped table-responsive">

                            @include('partials/errors')
                            @include('partials/succeed')

                            <table class="table">
                                <tr>
                                    <th>Número de inventario</th>
                                    <th>Nomenclatura</th>
                                    <th>Descripción</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Número de serie</th>
                                    <th>Color</th>
                                    <th>Descripción adicional</th>
                                    <td>Acción</td>
                                </tr>
                                @forelse($employee->devices as $device)
                                    <tr>
                                        <td>{{ $device->InventoryNumberDevice }}</td>
                                        <td>{{ $device->NomenclatureDevice }}</td>
                                        <td>{{ $device->DescriptionDevice }}</td>
                                        <td>{{ $device->BrandDevice }}</td>
                                        <td>{{ $device->ModelDevice }}</td>
                                        <td>{{ $device->SerialNumberDevice }}</td>
                                        <td>{{ $device->ColorDevice }}</td>
                                        <td>{{ $device->DescriptionAdDevice }}</td>
                                        <td>

                                            <a href="{{ route('deleteAssignDev', ['idDev' => $device->id]) }}">
                                                Eliminar asignación
                                            </a>

                                        </td>
                                    </tr>
                                @empty
                                    <div class="jumbotron">
                                        <p>There is no data</p>
                                    </div>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection



