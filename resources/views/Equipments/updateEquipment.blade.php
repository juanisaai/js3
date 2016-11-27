@extends('layouts.app')

@section('title')
    Equipos - Actualizar | Sistema de inventario
@endsection

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Actualizar datos de equipo: <strong>{{ $equipment->InventoryNumberEquipment }}</strong></h1>
                    </div>

                    <div class="panel-body">

                        @include('partials/errors')
                        @include('partials/succeed')

                        {!! Form::model(array($equipment, [
                            'method' => 'PATCH',
                            'route'  => ['updateEquipment', $equipment->id]
                        ])) !!}

                        <div class="form-group has-warning">
                            {!! Form::label('DescriptionEquipment', 'Tipo de equipo') !!}
                            {!! Form::select('DescriptionEquipment', ['CPU' => 'Unidad Central de Procesamiento', 'Laptop' => 'Laptop', 'Monitor' => 'Monitor', 'NoBreak' => 'No Break', 'CurrentRegulator' => 'Regulador de corriente'], $equipment->DescriptionEquipment, ['class' => 'selectpicker'] ) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('TypeAssemblyEquipment', 'Tipo de ensamble') !!}
                            {!! Form::select('TypeAssemblyEquipment', ['Assembly' => 'Ensamblada', 'Manufacture' => 'Fábrica'], $equipment->TypeAssemblyEquipment, ['class' => 'selectpicker'] ) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group">
                            {!! Form::label('InventoryNumberEquipment', 'Número de inventario') !!}
                            {!! Form::text('InventoryNumberEquipment', $equipment->InventoryNumberEquipment, ['class' => 'form-control', 'placeholder' => 'Escribe el número de inventario']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('NomenclatureEquipment', 'Nomenclatura') !!}
                            {!! Form::text('NomenclatureEquipment', $equipment->NomenclatureEquipment, ['class' => 'form-control', 'placeholder' => 'Escribe la nomenclatura']) !!}
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('BrandEquipment', 'Marca') !!}
                            {!! Form::text('BrandEquipment', $equipment->BrandEquipment, ['class' => 'form-control', 'placeholder' => 'Escribe la marca del equipo']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('ModelEquipment', 'Modelo') !!}
                            {!! Form::text('ModelEquipment', $equipment->ModelEquipment, ['class' => 'form-control', 'placeholder' => 'Escribe el modelo del equipo']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>


                        <div class="form-group">
                            {!! Form::label('SerialNumberEquipment', 'Número de serie') !!}
                            {!! Form::text('SerialNumberEquipment', $equipment->SerialNumberEquipment, ['class' => 'form-control', 'placeholder' => 'Escribe el número de serie del equipo']) !!}
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('ColorEquipment', 'Color') !!}
                            {!! Form::text('ColorEquipment', $equipment->ColorEquipment, ['class' => 'form-control', 'placeholder' => 'Escribe el color del equipo']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group">
                            {!! Form::label('DescriptionAdEquipment', 'Descripción adicional') !!}
                            {!! Form::textarea('DescriptionAdEquipment', $equipment->DescriptionAdEquipment, ['class' => 'form-control', 'placeholder' => 'Escribe una descripción adicional', 'rows' => 3, 'cols' => 40]) !!}
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('EquipmentOS', 'Sistema operativo') !!}
                            {!! Form::text('EquipmentOS', $equipment->EquipmentOS, ['class' => 'form-control', 'placeholder' => 'Escribe el sistema operativo']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group">
                            {!! Form::label('ArchitectureOS', 'Arquitectura de sistema operativo') !!}
                            {!! Form::text('ArchitectureOS', $equipment->ArchitectureOS, ['class' => 'form-control', 'placeholder' => 'Escribe la arquitectura del sistema operativo']) !!}
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('DistributionOS', 'Distribución de sistema operativo') !!}
                            {!! Form::text('DistributionOS', $equipment->DistributionOS, ['class' => 'form-control', 'placeholder' => 'Escribe la distribución del sistema operativo']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group">
                            {!! Form::label('SerialNumberOS', 'Número de serie de sistema operativo') !!}
                            {!! Form::text('SerialNumberOS', $equipment->SerialNumberOS, ['class' => 'form-control', 'placeholder' => 'Escribe el número de serie del sistema operativo']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('InventoryNumberOS', 'Número de inventario de sistema operativo') !!}
                            {!! Form::text('InventoryNumberOS', $equipment->InventoryNumberOS, ['class' => 'form-control', 'placeholder' => 'Escribe el número de inventario del sistema operativo']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('IPAddressEquipment', 'Dirección IP') !!}
                            {!! Form::text('IPAddressEquipment', $equipment->IPAddressEquipment, ['class' => 'form-control', 'placeholder' => 'Escribe la dirección IP']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('BrandMotherB', 'Marca de tarjeta madre') !!}
                            {!! Form::text('BrandMotherB', $equipment->BrandMotherB, ['class' => 'form-control', 'placeholder' => 'Escribe la marca de la tarjeta madre']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('ModelMotherB', 'Modelo de tarjeta madre') !!}
                            {!! Form::text('ModelMotherB', $equipment->ModelMotherB, ['class' => 'form-control', 'placeholder' => 'Escribe el modelo de la tarjeta madre']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('SerialNumberMotherB', 'Número de serie de tarjeta madre') !!}
                            {!! Form::text('SerialNumberMotherB', $equipment->SerialNumberMotherB, ['class' => 'form-control', 'placeholder' => 'Escribe el número de serie de la tarjeta madre']) !!}
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('BrandCPU', 'Marca de CPU') !!}
                            {!! Form::text('BrandCPU', $equipment->BrandCPU, ['class' => 'form-control', 'placeholder' => 'Escribe la marca del CPU']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('ModelCPU', 'Modelo de CPU') !!}
                            {!! Form::text('ModelCPU', $equipment->ModelCPU, ['class' => 'form-control', 'placeholder' => 'Escribe el modelo del CPU']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('FrequencyCPU', 'Frecuencia de CPU') !!}
                            {!! Form::text('FrequencyCPU', $equipment->FrequencyCPU, ['class' => 'form-control', 'placeholder' => 'Escribe la frecuencia del CPU']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group">
                            {!! Form::label('BrandRam', 'Marca de RAM') !!}
                            {!! Form::text('BrandRam', $equipment->BrandRam, ['class' => 'form-control', 'placeholder' => 'Escribe la marca de RAM']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('TypeRam', 'Tipo de RAM') !!}
                            {!! Form::text('TypeRam', $equipment->TypeRam, ['class' => 'form-control', 'placeholder' => 'Escribe el tipo de RAM']) !!}
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('CapabilityRam', 'Capacidad de RAM') !!}
                            {!! Form::text('CapabilityRam', $equipment->CapabilityRam, ['class' => 'form-control', 'placeholder' => 'Escribe la capacidad de RAM']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group">
                            {!! Form::label('BrandHHD', 'Marca de HHD') !!}
                            {!! Form::text('BrandHHD', $equipment->BrandHHD, ['class' => 'form-control', 'placeholder' => 'Escribe la marca de HDD']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('ModelHHD', 'Modelo de HHD') !!}
                            {!! Form::text('ModelHHD', $equipment->ModelHHD, ['class' => 'form-control', 'placeholder' => 'Escribe el modelo de HDD']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('TypeHHD', 'Tipo de HHD') !!}
                            {!! Form::text('TypeHHD', $equipment->TypeHHD, ['class' => 'form-control', 'placeholder' => 'Escribe el tipo de HDD']) !!}
                        </div>

                        <div class="form-group has-warning">
                            {!! Form::label('CapabilityHHD', 'Capacidad de HHD') !!}
                            {!! Form::text('CapabilityHHD', $equipment->CapabilityHHD, ['class' => 'form-control', 'placeholder' => 'Escribe la capacidad de HHD']) !!}
                            <small class="form-text text-muted">*Campo requerido</small>
                        </div>

                        <div class="form-group">
                            {!! Form::label('SerialNumberHHD', 'Número de serie de HHD') !!}
                            {!! Form::text('SerialNumberHHD', $equipment->SerialNumberHHD, ['class' => 'form-control', 'placeholder' => 'Escribe el número de serie de HDD']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('BrandDiscReader', 'Marca del lector de CD') !!}
                            {!! Form::text('BrandDiscReader', $equipment->BrandDiscReader, ['class' => 'form-control', 'placeholder' => 'Escribe la marca del lector de CD']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('TypeDiscReader', 'Tipo de lector') !!}
                            {!! Form::text('TypeDiscReader', $equipment->TypeDiscReader, ['class' => 'form-control', 'placeholder' => 'Escribe el tipo de lector de CD']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('active', 'Equipo activo') !!}
                            {!! Form::select('active',[ '1' => 'Sí', '0' => 'No'], $equipment->active, ['class' => 'selectpicker'] ) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                            <div class="form-group pull-right">
                                <a class="btn btn-danger btn-close" href="{{ route('readEquipments') }}">Cancelar</a>
                            </div>
                        </div>


                        {{ Form::close() }}

                    </div>

    @endif

                </div>
            </div>
        </div>
@endsection



