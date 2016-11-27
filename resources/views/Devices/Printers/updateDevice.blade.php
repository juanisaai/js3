@extends('layouts.app')

@section('title')
    Impresoras - Actualizar | Sistema de inventario
@endsection

@section('content')

    @if (Auth::guest())

        @include('partials.login')

    @else

        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Actualizar datos de Impresora:
                            @if(empty($devices->InventoryNumberDevice) or (($devices->InventoryNumberDevice) === null))
                                <strong>S/N</strong>
                            @else
                                <strong>{{ $devices->InventoryNumberDevice }}</strong>
                            @endif
                        </h1>
                    </div>

                    <div class="panel-body">

                        @include('partials.errors')
                        @include('partials.succeed')

                        {!! Form::model(array($devices, [
                            'method' => 'PATCH',
                            'route'  => ['updateDevice', $devices->id]
                        ])) !!}

                        <div class="form-group">
                            {!! Form::label('InventoryNumberDevice', 'Número de inventario') !!}
                            {!! Form::text('InventoryNumberDevice', $devices->InventoryNumberDevice, ['class' => 'form-control', 'placeholder' => 'Escribe el número de inventario']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('NomenclatureDevice', 'Nomenclatura') !!}
                            {!! Form::text('NomenclatureDevice', $devices->NomenclatureDevice, ['class' => 'form-control', 'placeholder' => 'Escribe la nomenclatura']) !!}
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('TypeDevice', 'Tipo de dispositivo') !!}
                            {!! Form::text('TypeDevice', $devices->TypeDevice, ['class' => 'form-control', 'placeholder' => 'Escribe el tipo de dispositivo']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('BrandDevice', 'Marca') !!}
                            {!! Form::text('BrandDevice', $devices->BrandDevice, ['class' => 'form-control', 'placeholder' => 'Escribe la marca']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('ModelDevice', 'Modelo') !!}
                            {!! Form::text('ModelDevice', $devices->ModelDevice, ['class' => 'form-control', 'placeholder' => 'Escribe el modelo']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('SerialNumberDevice', 'Número de serie') !!}
                            {!! Form::text('SerialNumberDevice', $devices->SerialNumberDevice, ['class' => 'form-control', 'placeholder' => 'Escribe número de serie']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('ColorDevice', 'Color') !!}
                            {!! Form::text('ColorDevice', $devices->ColorDevice, ['class' => 'form-control', 'placeholder' => 'Escribe el color']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group">
                            {!! Form::label('DescriptionAdDevice', 'Descripción adicional') !!}
                            {!! Form::text('DescriptionAdDevice', $devices->DescriptionAdDevice, ['class' => 'form-control', 'placeholder' => 'Escribe una descripción adicional']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('DescriptionDevice', 'Tipo de equipo') !!}
                            {!! Form::select('DescriptionDevice',[ 'Impresora' => 'Equipo impresora'], 'Impresora', ['class' => 'selectpicker'] ) !!}
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



