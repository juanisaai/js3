@extends('layouts.app')

@section('content')
    @if (Auth::guest())

        @include('partials/login')

    @else
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Crear nueva hoja de recepción</h1>
                </div>

                <div class="panel-body">

                    @include('partials/errors')
                    @include('partials/succeed')

                    {!! Form::open(array('url' => 'storeRec', 'method' => 'POST', 'class' => 'form')) !!}

                    <div class="form-group">
                        {!! Form::label('equipment_id', 'Seleccionar equipo') !!}
                        {{ Form::select('equipment_id', $equipments, null, ['class' => 'selectpicker']) }}
                    </div>

                    <div class="form-group">
                        {!! Form::label('TypeTrouble', 'Tipo de problema') !!}
                        {{Form::select('TypeTrouble', ['Hardware' => 'Hardware', 'Software' => 'Software'], null, ['class' => 'selectpicker'])}}
                    </div>

                    <div class="form-group">
                        {!! Form::label('ReasonReception', 'Motivo de recepción') !!}
                        {!! Form::textarea('ReasonReception', null, ['class' => 'form-control', 'placeholder' => 'Escribe el motivo de la recepción', 'rows' => 3, 'cols' => 40]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('ObservationReception', 'Observaciones') !!}
                        {!! Form::textarea('ObservationReception', null, ['class' => 'form-control', 'placeholder' => 'Escribe las observaciones', 'rows' => 3, 'cols' => 40]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('user_id', 'Seleccionar técnico') !!}
                        {{ Form::select('user_id', $technicians, null, ['class' => 'selectpicker']) }}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Receptionist', 'Recepciona') !!}
                        {{ Form::select('Receptionist', $receptionist, null, ['class' => 'selectpicker']) }}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Petitioner', 'Nombre del solicitante') !!}
                        {{ Form::select('Petitioner', $petitioner, null, ['class' => 'selectpicker']) }}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Receive', 'Recibe') !!}
                        {{ Form::select('Receive', $receptionist, null, ['class' => 'selectpicker']) }}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
                        <div class="form-group pull-right">
                            <a class="btn btn-danger btn-close" href="{{ route('seeReceptions') }}">Cancelar</a>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
    @endif
            </div>
        </div>
    </div>
@endsection



