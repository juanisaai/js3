@extends('layouts.app')

@section('content')
    @if (Auth::guest())

        <div class="container">
            <div class="jumbotron">
                <h1>Oops!</h1>
                <p>Please log in</p>
                <p><a class="btn btn-primary btn-lg" href="{{ url('/login') }}" role="button">Log in</a></p>
            </div>
        </div>
    @else
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Crear un nuevo usuario</div>

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
                    </div>


                    {{ Form::close() }}

                </div>


    @endif
            </div>
        </div>
    </div>
@endsection



