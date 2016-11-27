@extends('layouts.app')

@section('title')
    Hojas de servicio - Crear | Sistema de inventario
@endsection

@section('content')
    @if (Auth::guest())

        @include('partials/login')

    @else
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Crear nueva hoja de servicio</h1>
                </div>

                <div class="panel-body">

                    @include('partials/errors')
                    @include('partials/succeed')


                    {!! Form::open(array('url' => 'createSerquest', 'method' => 'POST', 'class' => 'form')) !!}

                    <div class="form-group has-warning">
                        {!! Form::label('ReasonRequests', 'Razón de solicitud') !!}
                        {!! Form::textarea('ReasonRequests', null, ['class' => 'form-control', 'placeholder' => 'Escribe la razón de la solicitud', 'rows' => 3, 'cols' => 40]) !!}
                        <small class="form-text text-muted">*Campo requerido</small>
                    </div>

                    <div class="form-group has-warning">
                        {!! Form::label('DescriptionService', 'Descripción del servicio') !!}
                        {!! Form::textarea('DescriptionService', null, ['class' => 'form-control', 'placeholder' => 'Escribe una descripción del servicio', 'rows' => 3, 'cols' => 40]) !!}
                        <small class="form-text text-muted">*Campo requerido</small>
                    </div>

                    <div class="form-group">
                        {!! Form::label('receptionist', 'Recibe') !!}
                        {{ Form::select('receptionist', $receptionist, null, ['class' => 'selectpicker']) }}
                    </div>

                    <div class="form-group">
                        {!! Form::label('TechnicianAssigned', 'Seleccionar técnico') !!}
                        {{ Form::select('TechnicianAssigned', $technicians, null, ['class' => 'selectpicker']) }}
                    </div>

                    <div class="form-group">
                        {!! Form::label('employee_id', 'Empleado solicitante') !!}
                        {{ Form::select('employee_id', $employee, null, ['class' => 'selectpicker']) }}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
                        <div class="form-group pull-right">
                            <a class="btn btn-danger btn-close" href="{{ route('seeAllRequests') }}">Cancelar</a>
                        </div>
                    </div>


                    {{ Form::close() }}

                </div>


    @endif
            </div>
        </div>
    </div>
@endsection



