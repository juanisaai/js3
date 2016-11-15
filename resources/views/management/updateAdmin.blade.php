@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Actualizar datos del administrador: <strong>{{ $user->name }}</strong></h1>
                    </div>
                        <div class="panel-body">

                        @include('partials/errors')
                        @include('partials/succeed')

                        {!! Form::model(array($user, [
                            'method' => 'PATCH',
                            'route'  => ['updateAdmin', $user->id]
                        ])) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Nombres') !!}
                            {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Escribe el nombre del usuario']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('username', 'Nombre de usuario') !!}
                            {!! Form::text('username', $user->username, ['class' => 'form-control', 'placeholder' => 'Escribe un nombre de usuario']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Escribe un email']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('contact', 'Contacto') !!}
                            {!! Form::text('contact', $user->contact, ['class' => 'form-control', 'placeholder' => 'Escribe un contacto']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', 'Contraseña') !!}
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Escribe tu nueva password']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('active', 'Selecciona el estado del usuario') !!}
                            {!! Form::select('active',[ '1' => 'Activo', '0' => 'Desactivado'], '1' ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('type', 'Selecciona el tipo de usuario') !!}
                            {!! Form::select('type',[ 'Technician' => 'Técnico', 'Collaborate' => 'Colaborador', 'Admin' => 'Administrador'], $user->type, ['class' => 'selectpicker'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
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



