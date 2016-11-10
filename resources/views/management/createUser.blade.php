@extends('layouts.app')

@section('content')
    @if (Auth::guest())

        @include('partials/login')

    @else
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Crear nuevo usuario</h1>
                </div>

                <div class="panel-body">

                    @include('partials/errors')
                    @include('partials/succeed')

                    {!! Form::open(array('url' => 'users', 'method' => 'POST', 'class' => 'form')) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Nombres') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Escribe el nombre del usuario']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('username', 'Nombre de usuario') !!}
                        {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Escribe un nombre de usuario']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Escribe un email']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('contact', 'Contacto') !!}
                        {!! Form::text('contact', null, ['class' => 'form-control', 'placeholder' => 'Escribe un número de contacto']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password', 'Contraseña') !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Escribe la contraseña']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('active', 'Estado del usuario') !!}
                        {!! Form::select('active',[ '1' => 'Activo', '0' => 'Desactivado'], '1' ) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('type', 'Selecciona el tipo de usuario') !!}
                        {!! Form::select('type',[ 'Technician' => 'Técnico', 'Collaborate' => 'Colaborador', 'Admin' => 'Administrador'], 'Collaborate' ) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
                        <div class="form-group pull-right">
                            <a class="btn btn-danger btn-close" href="{{ route('readUser') }}">Cancelar</a>
                        </div>
                    </div>


                    {{ Form::close() }}

                </div>


    @endif
            </div>
        </div>
    </div>
@endsection



