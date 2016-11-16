@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Resumen de equipos asignados</h1>
                        </div>
                        <div class="panel-body table-hover table-striped table-responsive">

                            @include('partials/errors')
                            @include('partials/succeed')

                            <table class="table">
                                <tr>
                                    <th>Empleado</th>
                                    <th>Departamento</th>
                                    <th>Dispositivos</th>
                                    <th>Acciones</th>
                                    <th>
                                        <a href="{{ route('newAssignEq') }}"><button type="button" class="btn btn-success pull-right">Crear</button></a>
                                    </th>
                                </tr>

                                @foreach($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->ProfileEmployee }} {{ $employee->FirstName }} {{ $employee->SecondName }}</td>
                                        <td>{{ $employee->Area->NameArea }}</td>
                                        <td>
                                            <ul>
                                                @foreach($employee->equipments as $equipment)
                                                    <li>{{ $equipment->InventoryNumberEquipment }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <a href="{{ route('seeDetailsAssignEq', ['id' => $employee->id]) }}"><button type="button" class="btn btn-info btn-sm">Ver más</button></a>
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



