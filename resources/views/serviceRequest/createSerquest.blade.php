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
                <div class="panel-heading">Crear nueva hoja de servicio</div>

                <div class="panel-body">

                    @include('partials/errors')
                    @include('partials/succeed')

                    <p><strong>Folio </strong>{{ $folioView }}</p>

                    {!! Form::open(array('url' => 'createSerquest', 'method' => 'POST', 'class' => 'form')) !!}

                    <div class="form-group">
                        {!! Form::label('ReasonRequests', 'Razón de solicitud') !!}
                        {!! Form::textarea('ReasonRequests', null, ['class' => 'form-control', 'placeholder' => 'Escribe la razón de la solicitud']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('receptionist', 'Recibe') !!}
                        {!! Form::text('receptionist', null, ['class' => 'form-control', 'placeholder' => 'Escribe el nombre de quíen recepciona']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('TechnicianAssigned', 'Técnico asignado') !!}
                        {!! Form::text('TechnicianAssigned', 'ISC. Harvey J. León Uc', ['class' => 'form-control', 'placeholder' => 'Escribe el nombre del técnico asignado']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('employee_id', 'Empleado solicitante') !!}
                        {{ Form::select('employee_id', $employee) }}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                    </div>


                    {{ Form::close() }}

                </div>


    @endif
            </div>
        </div>
    </div>
@endsection



