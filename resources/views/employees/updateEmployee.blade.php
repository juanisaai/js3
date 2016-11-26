@extends('layouts.app')

@section('title')
    Empleados - Actualizar | Sistema de inventario
@endsection

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

                        <div class="form-group has-warning">
                            {!! Form::label('RoleEmployee', 'Rol del empleado') !!}
                            {!! Form::text('RoleEmployee', null, ['class' => 'form-control', 'placeholder' => 'Por ejemplo: Jefe, Jefa, Encargado']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('ProfileEmployee', 'Perfil del empleado') !!}
                            {!! Form::text('ProfileEmployee', $employee->ProfileEmployee, ['class' => 'form-control', 'placeholder' => 'Por ejemplo: Dr. Dra. Ing. Lic.']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('FirstName', 'Nombres') !!}
                            {!! Form::text('FirstName', $employee->FirstName, ['class' => 'form-control', 'placeholder' => 'Escribe lo(s) nombre(s)']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('SecondName', 'Apellidos') !!}
                            {!! Form::text('SecondName', $employee->SecondName, ['class' => 'form-control', 'placeholder' => 'Escribe los apellidos']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group">
                            {!! Form::label('RoleEmployee', 'Rol del empleado') !!}
                            {!! Form::text('RoleEmployee', $employee->RoleEmployee, ['class' => 'form-control', 'placeholder' => 'Por ejemplo: Jefe, Encargado, Responsable']) !!}
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('area_id', 'Selecciona el área') !!}
                            {{ Form::select('area_id', $areas, $employee->area_id, ['class' => 'selectpicker']) }}
                            <small class="form-text text-muted">*Campo requerido</small>
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



