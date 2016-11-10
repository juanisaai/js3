@extends('layouts.app')

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

                    <div class="form-group">
                        {!! Form::label('ProfileEmployee', 'Perfil del empleado') !!}
                        {!! Form::text('ProfileEmployee', null, ['class' => 'form-control', 'placeholder' => 'Por ejemplo: Dr. Dra. Ing. Lic.']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('FirstName', 'Nombres') !!}
                        {!! Form::text('FirstName', null, ['class' => 'form-control', 'placeholder' => 'Escribe lo(s) nombre(s)']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('SecondName', 'Apellidos') !!}
                        {!! Form::text('SecondName', null, ['class' => 'form-control', 'placeholder' => 'Escribe los apellidos']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('RoleEmployee', 'Rol del empleado') !!}
                        {!! Form::text('RoleEmployee', null, ['class' => 'form-control', 'placeholder' => 'Por ejemplo: Jefe, Jefa, Encargado']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('area_id', 'Select area') !!}
                        {{ Form::select('area_id', $areas) }}
                    </div>

                    <div class="form-group">
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



