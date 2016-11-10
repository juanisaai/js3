@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Iniciar sesión</div>

                <div class="panel-body">

                    @include('partials/errors')

                        {!! Form::open(array('route' => 'login', 'method' => 'POST', 'class' => 'form-horizontal')) !!}

                        <div class="form-group">
                            {!! Form::label('username', 'Nombre de usuario', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Escribe tu nombre de usuario', 'required'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', 'Contraseña', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Escribe tu contraseña', 'required'])!!}
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">

                                {!! Form::submit('Entrar', ['class' => 'btn btn-primary']) !!}

                            </div>
                        </div>

                        {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
