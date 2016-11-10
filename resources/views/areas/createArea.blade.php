@extends('layouts.app')

@section('content')
    @if (Auth::guest())

        @include('partials/login')

    @else
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Crear nueva área</h1>
                </div>

                <div class="panel-body">

                    @include('partials/errors')
                    @include('partials/succeed')

                    {!! Form::open(array('url' => 'areas', 'method' => 'POST', 'class' => 'form')) !!}

                    <div class="form-group">
                        {!! Form::label('namearea', 'Nombre de área') !!}
                        {!! Form::text('NameArea', null, ['class' => 'form-control', 'placeholder' => 'Escribe el nombre de área']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('unitarea', 'Unidad') !!}
                        {!! Form::text('UnitArea', null, ['class' => 'form-control', 'placeholder' => 'Escribe la unidad']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('extensionarea', 'Nombre de extensión') !!}
                        {!! Form::text('ExtensionArea', null, ['class' => 'form-control', 'placeholder' => 'Escribe la extensión']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('directoratearea', 'Dirección') !!}
                        {!! Form::text('DirectorateArea', null, ['class' => 'form-control', 'placeholder' => 'Escribe la dirección']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
                        <div class="form-group pull-right">
                            <a class="btn btn-danger btn-close" href="{{ route('readArea') }}">Cancelar</a>
                        </div>
                    </div>


                    {{ Form::close() }}

                </div>


                @endif
            </div>
        </div>
    </div>
@endsection



