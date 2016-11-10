@extends('layouts.app')

@section('content')
    @if (Auth::guest())

        @include('partials/login')

    @else
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Crear nuevo equipo</h1>
                </div>

                <div class="panel-body">

                    @include('partials/errors')
                    @include('partials/succeed')

                    {!! Form::open(array('url' => 'equipments', 'method' => 'POST', 'class' => 'form')) !!}

                    <div class="form-group">
                        {!! Form::label('InventoryNumberEquipment', 'Número de inventario') !!}
                        {!! Form::text('InventoryNumberEquipment', null, ['class' => 'form-control', 'placeholder' => 'Escribe el número de inventario']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('NomenclatureEquipment', 'Nomenclatura') !!}
                        {!! Form::text('NomenclatureEquipment', null, ['class' => 'form-control', 'placeholder' => 'Escribe la nomenclatura']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('DescriptionEquipment', 'Descripción') !!}
                        {!! Form::text('DescriptionEquipment', null, ['class' => 'form-control', 'placeholder' => 'Escribe la descripción del equipo']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('BrandEquipment', 'Marca') !!}
                        {!! Form::text('BrandEquipment', null, ['class' => 'form-control', 'placeholder' => 'Escribe la marca del equipo']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('ModelEquipment', 'Modelo') !!}
                        {!! Form::text('ModelEquipment', null, ['class' => 'form-control', 'placeholder' => 'Escribe el modelo del equipo']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('SerialNumberEquipment', 'Escribe el número de serie') !!}
                        {!! Form::text('SerialNumberEquipment', null, ['class' => 'form-control', 'placeholder' => 'Escribre el número de serie del equipo']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('ColorEquipment', 'Color') !!}
                        {!! Form::text('ColorEquipment', null, ['class' => 'form-control', 'placeholder' => 'Escribe el color del equipo']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('DescriptionAdEquipment', 'Descripción adicional') !!}
                        {!! Form::textarea('DescriptionAdEquipment', null, ['class' => 'form-control', 'placeholder' => 'Escribe una descripción adicional', 'rows' => 3, 'cols' => 40]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('TypeEquipment', 'Tipo de equipo') !!}
                        {!! Form::text('TypeEquipment', null, ['class' => 'form-control', 'placeholder' => 'Escribe el tipo de equipo']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('TypeAssemblyEquipment', 'Tipo de ensamble') !!}
                        {!! Form::text('TypeAssemblyEquipment', null, ['class' => 'form-control', 'placeholder' => 'Escribe el tipo de ensamble']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('OSEquipment', 'Sistema operativo') !!}
                        {!! Form::text('OSEquipment', null, ['class' => 'form-control', 'placeholder' => 'Escribe el sistema operativo']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('IPAddressEquipment', 'Dirección IP') !!}
                        {!! Form::text('IPAddressEquipment', null, ['class' => 'form-control', 'placeholder' => 'Escribe la dirección IP']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('BrandMotherB', 'Marca de tarjeta madre') !!}
                        {!! Form::text('BrandMotherB', null, ['class' => 'form-control', 'placeholder' => 'Escribe la marca de la tarjeta madre']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('ModelMotherB', 'Modelo de tarjeta madre') !!}
                        {!! Form::text('ModelMotherB', null, ['class' => 'form-control', 'placeholder' => 'Escribe el modelo de la tarjeta madre']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('SerialNumberMotherB', 'Número de serie de tarjeta madre') !!}
                        {!! Form::text('SerialNumberMotherB', null, ['class' => 'form-control', 'placeholder' => 'Escribe el número de serie de la tarjeta madre']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('BrandCPU', 'Marca de CPU') !!}
                        {!! Form::text('BrandCPU', null, ['class' => 'form-control', 'placeholder' => 'Escribe la marca del CPU']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('ModelCPU', 'Modelo de CPU') !!}
                        {!! Form::text('ModelCPU', null, ['class' => 'form-control', 'placeholder' => 'Escribe el modelo del CPU']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('FrequencyCPU', 'Frecuencia de CPU') !!}
                        {!! Form::text('FrequencyCPU', null, ['class' => 'form-control', 'placeholder' => 'Escribe la frecuencia del CPU']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('BrandRam', 'Marca de RAM') !!}
                        {!! Form::text('BrandRam', null, ['class' => 'form-control', 'placeholder' => 'Escribe la marca de RAM']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('TypeRam', 'Tipo de RAM') !!}
                        {!! Form::text('TypeRam', null, ['class' => 'form-control', 'placeholder' => 'Escribe el tipo de RAM']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('CapabilityRam', 'Capacidad de RAM') !!}
                        {!! Form::text('CapabilityRam', null, ['class' => 'form-control', 'placeholder' => 'Escribe la capacidad de RAM']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('BrandHHD', 'Marca de HHD') !!}
                        {!! Form::text('BrandHHD', null, ['class' => 'form-control', 'placeholder' => 'Escribe la marca de HDD']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('ModelHHD', 'Modelo de HHD') !!}
                        {!! Form::text('ModelHHD', null, ['class' => 'form-control', 'placeholder' => 'Escribe el modelo de HDD']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('TypeHHD', 'Tipo de HHD') !!}
                        {!! Form::text('TypeHHD', null, ['class' => 'form-control', 'placeholder' => 'Escribe el tipo de HDD']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('CapabilityHHD', 'Capacidad de HHD') !!}
                        {!! Form::text('CapabilityHHD', null, ['class' => 'form-control', 'placeholder' => 'Escribe la capacidad de HHD']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('SerialNumberHHD', 'Número de serie de HHD') !!}
                        {!! Form::text('SerialNumberHHD', null, ['class' => 'form-control', 'placeholder' => 'Escribe el número de serie de HDD']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('BrandDiscReader', 'Marca del lector de CD') !!}
                        {!! Form::text('BrandDiscReader', null, ['class' => 'form-control', 'placeholder' => 'Escribe la marca del lector de CD']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('TypeDiscReader', 'Tipo de lector') !!}
                        {!! Form::text('TypeDiscReader', null, ['class' => 'form-control', 'placeholder' => 'Escribe el tipo de lector de CD']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
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



