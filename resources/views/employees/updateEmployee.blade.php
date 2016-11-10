@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Actualizar datos del empleado: <strong>{{ $employee->full_name }}</strong></h1>
                    </div>
                    <div class="panel-body">

                        @include('partials/errors')
                        @include('partials/succeed')

                        {!! Form::model(array($employee, [
                            'method' => 'PATCH',
                            'route'  => ['updateEmployee', $employee->id]
                        ])) !!}

                        <div class="form-group">
                            {!! Form::label('ProfileEmployee', 'Perfil del empleado') !!}
                            {!! Form::text('ProfileEmployee', $employee->ProfileEmployee, ['class' => 'form-control', 'placeholder' => 'Por ejemplo: Dr. Dra. Ing. Lic.']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('FirstName', 'Nombres') !!}
                            {!! Form::text('FirstName', $employee->FirstName, ['class' => 'form-control', 'placeholder' => 'Escribe lo(s) nombre(s)']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('SecondName', 'Apellidos') !!}
                            {!! Form::text('SecondName', $employee->SecondName, ['class' => 'form-control', 'placeholder' => 'Escribe los apellidos']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('RoleEmployee', 'Rol del empleado') !!}
                            {!! Form::text('RoleEmployee', $employee->RoleEmployee, ['class' => 'form-control', 'placeholder' => 'Por ejemplo: Jefe, Jefa, Encargado']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('area_id', 'Selecciona el área') !!}
                            {{ Form::select('area_id', $areas, $employee->area_id) }}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                            <div class="form-group pull-right">
                                <a class="btn btn-danger btn-close" href="{{ route('readEmployee') }}">Cancelar</a>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>

    @endif

                </div>
            </div>
        </div>
@endsection



