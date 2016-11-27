@extends('layouts.app')

@section('title')
    Dictamen de dispositivos - Crear | Sistema de inventario
@endsection

@section('content')
    @if (Auth::guest())

        @include('partials/login')

    @else
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Crear nuevo dictamen de <strong>dispositivo</strong></h1>
                </div>

                <div class="panel-body">

                    @include('partials/errors')
                    @include('partials/succeed')

                    {!! Form::open(array('url' => 'dictumdev', 'method' => 'POST', 'class' => 'form')) !!}

                    <div class="form-group">
                        {!! Form::label('device_id', 'Seleccionar dispositivo') !!}
                        {{ Form::select('device_id', $devices, null, ['class' => 'selectpicker']) }}
                    </div>

                    <div class="form-group has-warning">
                        {!! Form::label('Problematic', 'Problemática') !!}
                        {!! Form::textarea('Problematic', null, ['class' => 'form-control', 'placeholder' => 'Escribe la problemática', 'rows' => 3, 'cols' => 40]) !!}
                        <small class="form-text text-muted">*Campo requerido</small>
                    </div>

                    <div class="form-group has-warning">
                        {!! Form::label('Dictum', 'Dictamen') !!}
                        {!! Form::textarea('Dictum', null, ['class' => 'form-control', 'placeholder' => 'Escribe el dictamen', 'rows' => 3, 'cols' => 40]) !!}
                        <small class="form-text text-muted">*Campo requerido</small>
                    </div>

                    <div class="form-group">
                        {!! Form::label('Recommendation', 'Recomendaciones') !!}
                        {!! Form::textarea('Recommendation', null, ['class' => 'form-control', 'placeholder' => 'Escribe las recomendaciones', 'rows' => 3, 'cols' => 40]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('observations', 'Observaciones') !!}
                        {!! Form::textarea('observations', null, ['class' => 'form-control', 'placeholder' => 'Escribe las observaciones', 'rows' => 3, 'cols' => 40]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('user_id', 'Técnico') !!}
                        {{ Form::select('user_id', $users, null, ['class' => 'selectpicker']) }}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
                        <div class="form-group pull-right">
                            <a class="btn btn-danger btn-close" href="{{ route('readDictums') }}">Cancelar</a>
                        </div>
                    </div>


                    {{ Form::close() }}

                </div>


                @endif
            </div>
        </div>
    </div>
@endsection



