@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        @include('partials/login')


    @else

        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Actualizar datos de dictamen: <strong>{{$dictum->id}}</strong></h1>
                    </div>

                    <div class="panel-body">

                        @include('partials/errors')
                        @include('partials/succeed')

                        {!! Form::model(array($dictum, [
                            'method' => 'PATCH',
                            'route'  => ['updateDev', $dictum->id]
                        ])) !!}
                        <div class="form-group">
                            {!! Form::label('device_id', 'Seleccionar dispositivo') !!}
                            {{ Form::select('device_id', $devices, $dictum->device_id, ['class' => 'selectpicker']) }}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Problematic', 'Problemática') !!}
                            {!! Form::textarea('Problematic', $dictum->Problematic, ['class' => 'form-control', 'placeholder' => 'Escribe la problemática', 'rows' => 3, 'cols' => 40]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Dictum', 'Dictamen') !!}
                            {!! Form::textarea('Dictum', $dictum->Dictum, ['class' => 'form-control', 'placeholder' => 'Escribe el dictamen', 'rows' => 3, 'cols' => 40]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('Recommendation', 'Recomendaciones') !!}
                            {!! Form::textarea('Recommendation', $dictum->Recommendation, ['class' => 'form-control', 'placeholder' => 'Escribe las recomendaciones', 'rows' => 3, 'cols' => 40]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('observations', 'Observaciones') !!}
                            {!! Form::textarea('observations', $dictum->observations, ['class' => 'form-control', 'placeholder' => 'Escribe las observaciones', 'rows' => 3, 'cols' => 40]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('user_id', 'Técnico') !!}
                            {{ Form::select('user_id', $users, $dictum->user_id, ['class' => 'selectpicker']) }}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                            <div class="form-group pull-right">
                                <a class="btn btn-danger btn-close" href="{{ route('readDictums') }}">Cancelar</a>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
    @endif
                </div>
            </div>
        </div>
@endsection



