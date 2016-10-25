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
                    <div class="panel-heading">Actualizar datos del empleado </div>

                    <div class="panel-body">

                        @include('partials/errors')
                        @include('partials/succeed')

                        {!! Form::model(array($employee, [
                            'method' => 'PATCH',
                            'route'  => ['updateEmployee', $employee->id]
                        ])) !!}

                        <div class="form-group">
                            {!! Form::label('ProfileEmployee', 'Perfil del empleado') !!}
                            {!! Form::text('ProfileEmployee', $employee->ProfileEmployee, ['class' => 'form-control', 'placeholder' => 'Lic. Doc. Enfra. C.']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('FirstName', 'Nombres') !!}
                            {!! Form::text('FirstName', $employee->FirstName, ['class' => 'form-control', 'placeholder' => 'Escribe lo(s) nombre(s)']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('SecondName', 'Apellidos') !!}
                            {!! Form::text('SecondName', $employee->SecondName, ['class' => 'form-control', 'placeholder' => 'Escribe los apellidos']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('RoleEmployee', 'Función del empleado') !!}
                            {!! Form::text('RoleEmployee', $employee->RoleEmployee, ['class' => 'form-control', 'placeholder' => 'Jefe']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('area_id', 'Selecciona el área') !!}
                            {{ Form::select('area_id', $areas) }}
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



