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
                            <h1 class="panel-title">Empleados</h1>
                        </div>
                        <div class="panel-body table-hover table-striped table-responsive">

                            @include('partials/errors')
                            @include('partials/succeed')

                            <table class="table ">
                                <tr>
                                    <th>Empleado</th>
                                    <th>Rol del empleado</th>
                                    <th>Área</th>
                                    <th>Acciones</th>
                                    <th>
                                        <a href="{{ route('createEmployee') }}"><button type="button" class="btn btn-success pull-right">Crear</button></a>
                                    </th>
                                </tr>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->full_name }}</td>
                                        <td>{{ $employee->RoleEmployee }}</td>

                                        <td>
                                            @if(($employee->area->NameArea) === null)
                                                Sin asignar área
                                                @else
                                                {{ $employee->area->NameArea }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('editEmployee', ['id' => $employee->id]) }}"><button type="button" class="btn btn-warning btn-sm">Editar</button></a>
                                            <a href="{{ route('deleteEmployee', ['id' => $employee->id]) }}"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></a>
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
