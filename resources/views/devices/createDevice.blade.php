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
                <div class="panel-heading">Crear nuevo dispositivo</div>

                <div class="panel-body">

                    @include('partials/errors')
                    @include('partials/succeed')

                    {!! Form::open(array('url' => 'devices', 'method' => 'POST', 'class' => 'form')) !!}

                    <div class="form-group">
                        {!! Form::label('InventoryNumberDevice', 'Número de inventario') !!}
                        {!! Form::text('InventoryNumberDevice', null, ['class' => 'form-control', 'placeholder' => 'Escribe el número de inventario']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('NomenclatureDevice', 'Nomenclatura') !!}
                        {!! Form::text('NomenclatureDevice', null, ['class' => 'form-control', 'placeholder' => 'Escribe la nomenclatura']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('DescriptionDevice', 'Descripción') !!}
                        {!! Form::text('DescriptionDevice', null, ['class' => 'form-control', 'placeholder' => 'Escribe la descripción']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('BrandDevice', 'Marca') !!}
                        {!! Form::text('BrandDevice', null, ['class' => 'form-control', 'placeholder' => 'Escribe la marca']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('ModelDevice', 'Modelo') !!}
                        {!! Form::text('ModelDevice', null, ['class' => 'form-control', 'placeholder' => 'Escribe el modelo']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('SerialNumberDevice', 'Número de serie') !!}
                        {!! Form::text('SerialNumberDevice', null, ['class' => 'form-control', 'placeholder' => 'Escribe número de serie']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('ColorDevice', 'Color') !!}
                        {!! Form::text('ColorDevice', null, ['class' => 'form-control', 'placeholder' => 'Escribe el color']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('DescriptionAdDevice', 'Descripción adicional') !!}
                        {!! Form::text('DescriptionAdDevice', null, ['class' => 'form-control', 'placeholder' => 'Escribe una descripción adicional']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('active', 'Dispositivo activo') !!}
                        {!! Form::select('active',[ '1' => 'Sí', '0' => 'No'], '1' ) !!}
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



