@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        <div class="container">
            <div class="jumbotron">
                <h1>¡Oops! Tu sesión ha expirado</h1>
                <p>Por favor entra al sistema</p>
                <p><a class="btn btn-primary btn-lg" href="{{ url('/login') }}" role="button">Entrar</a></p>
            </div>
        </div>
    @else

        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Actualizar hoja de recepción </div>

                    <div class="panel-body">

                        @include('partials/errors')
                        @include('partials/succeed')

                        {!! Form::model(array($reception, [
                            'method' => 'PATCH',
                            'route'  => ['updateRec', 'idRec' => $reception->id]
                        ])) !!}

                        <div class="form-group">
                            {!! Form::label('StatusEquipment', 'Seleccione el estado') !!}
                            {{Form::select('StatusEquipment', ['Ready' => 'Listo', 'GenerateDictum' => 'Se generó dictamen'], $reception->StatusEquipment, ['placeholder' => 'Selecciona el estado del equipo'])}}
                        </div>

                        <div class="form-group">
                            {!! Form::label('NumberDictum', 'Número del dictamen') !!}
                            {!! Form::text('NumberDictum', $reception->NumberDictum, ['class' => 'form-control', 'placeholder' => 'Escribe el número del dictamen']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('equipment_id', 'Seleccionar equipo') !!}
                            {{ Form::select('equipment_id', $equipments, $reception->equipment_id) }}
                        </div>

                        <div class="form-group">
                            {!! Form::label('TypeTrouble', 'Tipo de problema') !!}
                            {{Form::select('TypeTrouble', ['Hardware' => 'Hardware', 'Software' => 'Software'], $reception->TypeTrouble, ['placeholder' => 'Selecciona el tipo de problema'])}}
                        </div>

                        <div class="form-group">
                            {!! Form::label('ReasonReception', 'Motivo de recepción') !!}
                            {!! Form::textarea('ReasonReception', $reception->ReasonReception, ['class' => 'form-control', 'placeholder' => 'Escribe el motivo de la recepción', 'rows' => 3, 'cols' => 40]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('ObservationReception', 'Observaciones') !!}
                            {!! Form::textarea('ObservationReception', $reception->ObservationReception, ['class' => 'form-control', 'placeholder' => 'Escribe las observaciones', 'rows' => 3, 'cols' => 40]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('user_id', 'Seleccionar técnico') !!}
                            {{ Form::select('user_id', $technicians, $reception->user_id) }}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Receptionist', 'Recepciona') !!}
                            {{ Form::select('Receptionist', $receptionist, $reception->Receptionist) }}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Petitioner', 'Nombre del solicitante') !!}
                            {{ Form::select('Petitioner', $petitioner, $reception->Petitioner) }}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Receive', 'Recibe') !!}
                            {!! Form::text('Receive', $reception->Receive, ['class' => 'form-control', 'placeholder' => 'Escribe el nombre de quién recibe']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                        </div>

                        {{ Form::close() }}

                    </div>

    @endif

                </div>
            </div>
        </div>
@endsection



