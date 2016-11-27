@extends('layouts.app')

@section('title')
    Administrador - Crear | Sistema de inventario
@endsection

@section('content')
    @if (Auth::guest())

        @include('partials.login')

    @else
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Crear nuevo administrador</h1>
                </div>

                <div class="panel-body">

                    @include('partials.errors')
                    @include('partials.succeed')

                    {!! Form::open(array('url' => 'admin', 'method' => 'POST', 'class' => 'form')) !!}

                    <div class="form-group has-warning">
                        {!! Form::label('name', 'Nombres') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Escribe el nombre del usuario']) !!}
                        <small class="form-text text-muted">*Campo requerido</small>
                    </div>

                    <div class="form-group has-warning">
                        {!! Form::label('username', 'Nombre de usuario') !!}
                        {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Escribe un nombre de usuario']) !!}
                        <small class="form-text text-muted">*Campo requerido</small>
                    </div>

                    <div class="form-group has-warning">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Escribe un email']) !!}
                        <small class="form-text text-muted">*Campo requerido</small>
                    </div>

                    <div class="form-group">
                        {!! Form::label('contact', 'Contacto') !!}
                        {!! Form::text('contact', null, ['class' => 'form-control', 'placeholder' => 'Escribe un número de contacto']) !!}
                    </div>

                    <div class="form-group has-warning">
                        {!! Form::label('password', 'Contraseña') !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Escribe la contraseña']) !!}
                        <small class="form-text text-muted">*Campo requerido</small>
                    </div>

                    <div class="form-group has-warning">
                        {!! Form::label('active', 'Estado del usuario') !!}
                        {!! Form::select('active',[ '1' => 'Activo', '0' => 'Desactivado'], '1', ['class' => 'selectpicker'] ) !!}
                        <small class="form-text text-muted">*Campo requerido</small>
                    </div>

                    <div class="form-group has-warning">
                        {!! Form::label('type', 'Tipo de usuario') !!}
                        {!! Form::select('type',['Admin' => 'Administrador'], 'Admin', ['class' => 'selectpicker'] ) !!}
                        <small class="form-text text-muted">*Campo requerido</small>
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
                        <div class="form-group pull-right">
                            <a class="btn btn-danger btn-close" href="{{ route('readAdmin') }}">Cancelar</a>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
    @endif
            </div>
        </div>
    </div>
@endsection



