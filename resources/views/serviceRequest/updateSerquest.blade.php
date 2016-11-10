@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Actualizar datos del empleado </div>

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
                            {!! Form::text('receptionist', $serquest->receptionist, ['class' => 'form-control', 'placeholder' => 'Escribe el nombre de quíen recepciona']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('TechnicianAssigned', 'Técnico asignado') !!}
                            {!! Form::text('TechnicianAssigned', $serquest->TechnicianAssigned, ['class' => 'form-control', 'placeholder' => 'Escribe el nombre del técnico asignado']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('employee_id', 'Empleado solicitante') !!}
                            {{ Form::select('employee_id', $employee) }}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                        </div>


                        {{ Form::close() }}

                    </div>

    @endif

                </div>
            </div>
        </div>
@endsection



