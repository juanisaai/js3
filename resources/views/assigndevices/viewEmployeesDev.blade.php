@extends('layouts.app')

@section('title')
    Asignaciones - Dispositivos | Sistema de inventario
@endsection

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Resumen de dispositivos asignados</h1>
                        </div>
                        <div class="panel-body table-responsive">
                            <div>
                                @include('partials/errors')
                                @include('partials/succeed')
                            </div>
                            <div>
                                <a href="{{ route('newAssign') }}"><button type="button" class="btn btn-success pull-right margintab">Crear</button></a>
                            </div>
                            <table class="table table-hover table-striped">
                                <tr>
                                    <th>Empleado</th>
                                    <th>Departamento</th>
                                    <th>Dispositivos</th>
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
                                            <a href="{{ route('seeDetailsAssignDev', ['id' => $employee->id]) }}"><button type="button" class="btn btn-info btn-sm">Ver más</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {!! $employees->render( ) !!}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection



