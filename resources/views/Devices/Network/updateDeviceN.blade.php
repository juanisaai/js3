@extends('layouts.app')

@section('title')
    Dispositivos - Actualizar | Sistema de inventario
@endsection

@section('content')

    @if (Auth::guest())

        @include('partials.login')

    @else

        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Actualizar datos del dispositivo:
                            @if(empty($devices->InventoryNumberDevice) or (($devices->InventoryNumberDevice) === null))
                                <strong>S/N</strong>
                            @else
                                <strong>{{ $devices->InventoryNumberDevice }}</strong>
                            @endif                        </h1>
                    </div>

                    <div class="panel-body">

                        @include('partials.errors')
                        @include('partials.succeed')

                        {!! Form::model(array($devices, [
                            'method' => 'PATCH',
                            'route'  => ['updateDeviceN', $devices->id]
                        ])) !!}

                        <div class="form-group">
                            {!! Form::label('InventoryNumberDevice', 'Número de inventario') !!}
                            {!! Form::text('InventoryNumberDevice', $devices->InventoryNumberDevice, ['class' => 'form-control', 'placeholder' => 'Escribe el número de inventario']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('NomenclatureDevice', 'Nomenclatura') !!}
                            {!! Form::text('NomenclatureDevice', $devices->NomenclatureDevice, ['class' => 'form-control', 'placeholder' => 'Escribe la nomenclatura']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('TypeDevice', 'Tipo de dispositivo') !!}
                            {!! Form::text('TypeDevice', $devices->TypeDevice, ['class' => 'form-control', 'placeholder' => 'Escribe el tipo de dispositivo']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('BrandDevice', 'Marca') !!}
                            {!! Form::text('BrandDevice', $devices->BrandDevice, ['class' => 'form-control', 'placeholder' => 'Escribe la marca']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('ModelDevice', 'Modelo') !!}
                            {!! Form::text('ModelDevice', $devices->ModelDevice, ['class' => 'form-control', 'placeholder' => 'Escribe el modelo']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('SerialNumberDevice', 'Número de serie') !!}
                            {!! Form::text('SerialNumberDevice', $devices->SerialNumberDevice, ['class' => 'form-control', 'placeholder' => 'Escribe número de serie']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('ColorDevice', 'Color') !!}
                            {!! Form::text('ColorDevice', $devices->ColorDevice, ['class' => 'form-control', 'placeholder' => 'Escribe el color']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('DescriptionAdDevice', 'Descripción adicional') !!}
                            {!! Form::text('DescriptionAdDevice', $devices->DescriptionAdDevice, ['class' => 'form-control', 'placeholder' => 'Escribe una descripción adicional']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('DescriptionDevice', 'Tipo de equipo') !!}
                            {!! Form::select('DescriptionDevice',[ 'Red' => 'Dispositivo Red'], 'Red', ['class' => 'selectpicker'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('active', 'Dispositivo activo') !!}
                            {!! Form::select('active',[ '1' => 'Sí', '0' => 'No'], $devices->active, ['class' => 'selectpicker'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                            <div class="form-group pull-right">
                                <a class="btn btn-danger btn-close" href="{{ route('readDevice') }}">Cancelar</a>
                            </div>
                        </div>


                        {{ Form::close() }}

                    </div>

    @endif

                </div>
            </div>
        </div>
@endsection


