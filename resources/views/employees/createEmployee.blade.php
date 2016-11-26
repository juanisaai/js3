@extends('layouts.app')

@section('title')
    Empleados - Crear | Sistema de inventario
@endsection

@section('content')
    @if (Auth::guest())

        @include('partials/login')

    @else
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Crear nuevo empleado </h1>
                </div>

                <div class="panel-body">

                    @include('partials/errors')
                    @include('partials/succeed')

                    {!! Form::open(array('url' => 'employees', 'method' => 'POST', 'class' => 'form')) !!}

                    <div class="form-group has-warning">
                        {!! Form::label('ProfileEmployee', 'Perfil del empleado', ['class' => 'form-control-label']) !!}
                        {!! Form::text('ProfileEmployee', null, ['class' => 'form-control form-control-warning', 'placeholder' => 'Por ejemplo: Dr. Dra. Ing. Lic.']) !!}
                        <small class="form-text text-muted">*Campo requerido</small>
                    </div>

                    <div class="form-group has-warning">
                        {!! Form::label('FirstName', 'Nombres') !!}
                        {!! Form::text('FirstName', null, ['class' => 'form-control', 'placeholder' => 'Escribe lo(s) nombre(s)']) !!}
                        <small class="form-text text-muted">*Campo requerido</small>
                    </div>

                    <div class="form-group has-warning">
                        {!! Form::label('SecondName', 'Apellidos') !!}
                        {!! Form::text('SecondName', null, ['class' => 'form-control', 'placeholder' => 'Escribe los apellidos']) !!}
                        <small class="form-text text-muted">*Campo requerido</small>
                    </div>

                    <div class="form-group">
                        {!! Form::label('RoleEmployee', 'Rol del empleado') !!}
                        {!! Form::text('RoleEmployee', null, ['class' => 'form-control', 'placeholder' => 'Por ejemplo: Jefe, Encargado, Responsable']) !!}
                    </div>

                    <div class="form-group has-warning">
                        {!! Form::label('area_id', 'Seleccionar área') !!}
                        {{ Form::select('area_id', $areas, null, ['class' => 'selectpicker']) }}
                        <small class="form-text text-muted">*Campo requerido</small>
                    </div>

                    <div class="form-group has-warning">
                        {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
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



