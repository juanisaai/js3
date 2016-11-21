@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Empleados disponibles</h1>
                    </div>
                    <div class="panel-body table-responsive">

                        <div>
                            @include('partials/errors')
                            @include('partials/succeed')
                        </div>

                        <table class="table table-hover table-striped">
                            <tr>
                                <th>Empleado</th>
                                <th>Departamento</th>
                                <th>Acción</th>
                            </tr>

                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{ $employee->ProfileEmployee }} {{ $employee->FirstName }} {{ $employee->SecondName }}</td>
                                    <td>{{ $employee->Area->NameArea }}</td>
                                    <td>
                                        <a href="{{ route('storeAssignEq', ['idEmp' => $employee->id, 'idEq' => $equipment->id]) }}"><button type="button" class="btn btn-primary btn-sm">Asignar</button></a>
                                    </td>

                                </tr>
                            @endforeach
                        </table>
                        {!! $employees->render( ) !!}
                    </div>
    @endif
                </div>
                <div class="form-group pull-left">
                    <a class="btn btn-danger btn-close" href="{{ route('seeEmployeesEq') }}">Cancelar</a>
                </div>
            </div>
        </div>
@endsection



