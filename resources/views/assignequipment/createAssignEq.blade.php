@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Empleados sin asignar</div>

                    <div class="panel-body">

                        @include('partials/errors')
                        @include('partials/succeed')

                        <table class="table">
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

                                        <a href="{{ route('storeAssignEq', ['idEmp' => $employee->id, 'idEq' => $equipment->id]) }}">
                                            Asignar
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
@endsection



