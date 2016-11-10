@extends('layouts.app')

@section('content')
    @if (Auth::guest())

        @include('partials/login')

    @else
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Crear nueva hoja de recepción</div>

                <div class="panel-body">

                    @include('partials/errors')
                    @include('partials/succeed')

                    {!! Form::open(array('url' => 'storeRec', 'method' => 'POST', 'class' => 'form')) !!}

                    <div class="form-group">
                        {!! Form::label('equipment_id', 'Seleccionar equipo') !!}
                        {{ Form::select('equipment_id', $equipments) }}
                    </div>

                    <div class="form-group">
                        {!! Form::label('TypeTrouble', 'Tipo de problema') !!}
                        {{Form::select('TypeTrouble', ['Hardware' => 'Hardware', 'Software' => 'Software'], null, ['placeholder' => 'Selecciona el tipo de problema'])}}
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
                        {{ Form::select('user_id', $technicians) }}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Receptionist', 'Recepciona') !!}
                        {{ Form::select('Receptionist', $receptionist) }}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Petitioner', 'Nombre del solicitante') !!}
                        {{ Form::select('Petitioner', $petitioner) }}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Receive', 'Recibe') !!}
                        {!! Form::text('Receive', null, ['class' => 'form-control', 'placeholder' => 'Escribe el nombre de quién recibe']) !!}
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



