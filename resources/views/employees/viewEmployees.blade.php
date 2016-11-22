@extends('layouts.app')

@section('title')
    Empleados | Sistema de inventario
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
                            <h1 class="panel-title">Empleados</h1>
                        </div>
                        <div class="panel-body table-responsive">
                            <div>
                                @include('partials/errors')
                                @include('partials/succeed')
                            </div>
                            <div>
                                <a href="{{ route('createEmployee') }}"><button type="button" class="btn btn-success pull-right margintab">Crear</button></a>
                            </div>
                            <table class="table table-hover table-striped">
                                <tr>
                                    <th>Empleado</th>
                                    <th>Rol del empleado</th>
                                    <th>Área</th>
                                    <th colspan="2" class="text-center">Acciones</th>
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
                                        </td>
                                        <td>
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
