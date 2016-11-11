@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Actualizar datos de solicitud de servicio</h1>
                    </div>

                    <div class="panel-body">

                        @include('partials/errors')
                        @include('partials/succeed')

                        <p><strong>Folio </strong>{{ $serquest->id }}</p>

                        {!! Form::model(array($serquest, [
                            'method' => 'PATCH',
                            'route'  => ['updateSerquest', $serquest->id]
                        ])) !!}

                        <div class="form-group">
                            {!! Form::label('ReasonRequests', 'Razón de solicitud') !!}
                            {!! Form::textarea('ReasonRequests', $serquest->ReasonRequests, ['class' => 'form-control', 'placeholder' => 'Escribe la razón de la solicitud']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('receptionist', 'Recibe') !!}
                            {{ Form::select('receptionist', $receptionist, $serquest->receptionist, ['class' => 'selectpicker']) }}
                        </div>

                        <div class="form-group">
                            {!! Form::label('TechnicianAssigned', 'Seleccionar técnico') !!}
                            {{ Form::select('TechnicianAssigned', $technicians, $serquest->TechnicianAssigned, ['class' => 'selectpicker']) }}
                        </div>

                        <div class="form-group">
                            {!! Form::label('employee_id', 'Empleado solicitante') !!}
                            {{ Form::select('employee_id', $employee, $serquest->employee_id, ['class' => 'selectpicker']) }}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
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



