@extends('layouts.app')

@section('title')
    Usuarios - Actualizar | Sistema de inventario
@endsection

@section('content')

    @if (Auth::guest())

        @include('partials.login')

    @else

        @can('Admin')

        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Actualizar datos del usuario: <strong>{{ $user->name }}</strong></h1>
                    </div>
                        <div class="panel-body">

                        @include('partials.errors')
                        @include('partials.succeed')

                        {!! Form::model(array($user, [
                            'method' => 'PATCH',
                            'route'  => ['updateUser', $user->id]
                        ])) !!}

                        <div class="form-group has-warning">
                            {!! Form::label('name', 'Nombres') !!}
                            {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Escribe el nombre del usuario']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('username', 'Nombre de usuario') !!}
                            {!! Form::text('username', $user->username, ['class' => 'form-control', 'placeholder' => 'Escribe un nombre de usuario']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Escribe un email']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group">
                            {!! Form::label('contact', 'Contacto') !!}
                            {!! Form::text('contact', $user->contact, ['class' => 'form-control', 'placeholder' => 'Escribe un contacto']) !!}
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('password', 'Contraseña') !!}
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Escribe tu nueva contraseña']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('active', 'Estado del usuario') !!}
                            {!! Form::select('active',[ '1' => 'Activo', '0' => 'Desactivado'], '1', ['class' => 'selectpicker'] ) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('type', 'Tipo de usuario') !!}
                            {!! Form::select('type',[ 'Technician' => 'Técnico', 'Collaborate' => 'Colaborador'], $user->type, ['class' => 'selectpicker'] ) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                            <div class="form-group pull-right">
                                <a class="btn btn-danger btn-close" href="{{ route('readUser') }}">Cancelar</a>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    @endcan
@endsection



