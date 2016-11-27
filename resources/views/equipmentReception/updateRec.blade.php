@extends('layouts.app')

@section('title')
    Recepción de equipos - Actualizar | Sistema de inventario
@endsection

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Actualizar hoja de recepción</h1>
                    </div>

                    <div class="panel-body">

                        @include('partials/errors')
                        @include('partials/succeed')

                        {!! Form::model(array($reception, [
                            'method' => 'PATCH',
                            'route'  => ['updateRec', 'idRec' => $reception->id]
                        ])) !!}

                        <div class="form-group has-warning">
                            {!! Form::label('NumberDoc', 'Número de oficio') !!}
                            {!! Form::text('NumberDoc', $reception->NumberDoc, ['class' => 'form-control', 'placeholder' => 'Escribe el número de oficio']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group">
                            {!! Form::label('StatusEquipment', 'Seleccione el estado del equipo') !!}
                            {{Form::select('StatusEquipment', ['Ready' => 'Listo', 'GenerateDictum' => 'Se generó dictamen'], $reception->StatusEquipment, ['class' => 'selectpicker'])}}
                        </div>

                        <h4>Si ha seleccionado generar dictamen, considere escribir el número de la misma</h4>

                        <div class="form-group">
                            {!! Form::label('NumberDictum', 'Número del dictamen') !!}
                            {!! Form::text('NumberDictum', $reception->NumberDictum, ['class' => 'form-control', 'placeholder' => 'Escribe el número del dictamen']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('equipment_id', 'Seleccionar equipo') !!}
                            {{ Form::select('equipment_id', $equipments, $reception->equipment_id, ['class' => 'selectpicker']) }}
                        </div>

                        <div class="form-group">
                            {!! Form::label('TypeTrouble', 'Tipo de problema') !!}
                            {{Form::select('TypeTrouble', ['Hardware' => 'Hardware', 'Software' => 'Software'], $reception->TypeTrouble, ['class' => 'selectpicker'])}}
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('ReasonReception', 'Motivo de recepción') !!}
                            {!! Form::textarea('ReasonReception', $reception->ReasonReception, ['class' => 'form-control', 'placeholder' => 'Escribe el motivo de la recepción', 'rows' => 3, 'cols' => 40]) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group">
                            {!! Form::label('ObservationReception', 'Observaciones') !!}
                            {!! Form::textarea('ObservationReception', $reception->ObservationReception, ['class' => 'form-control', 'placeholder' => 'Escribe las observaciones', 'rows' => 3, 'cols' => 40]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('AccessoryAdd', 'Accesorios adicionales') !!}
                            {!! Form::textarea('AccessoryAdd', $reception->AccessoryAdd, ['class' => 'form-control', 'placeholder' => 'Escribe los accesorios adicionales', 'rows' => 3, 'cols' => 40]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('user_id', 'Seleccionar técnico') !!}
                            {{ Form::select('user_id', $technicians, $reception->user_id, ['class' => 'selectpicker']) }}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Receptionist', 'Recepciona') !!}
                            {{ Form::select('Receptionist', $receptionist, $reception->Receptionist, ['class' => 'selectpicker']) }}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Petitioner', 'Nombre del solicitante') !!}
                            {{ Form::select('Petitioner', $petitioner, $reception->Petitioner, ['class' => 'selectpicker']) }}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Receive', 'Recibe') !!}
                            {{ Form::select('Receive', $receptionist, $reception->Receive, ['class' => 'selectpicker']) }}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
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



