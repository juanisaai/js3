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
                <div class="panel-heading">Create a new equipment</div>

                <div class="panel-body">

                    @include('partials/errors')
                    @include('partials/succeed')

                    {!! Form::open(array('url' => 'equipments', 'method' => 'POST', 'class' => 'form')) !!}

                    <div class="form-group">
                        {!! Form::label('InventoryNumberEquipment', 'Inventory Number Equipment') !!}
                        {!! Form::text('InventoryNumberEquipment', null, ['class' => 'form-control', 'placeholder' => 'Write inventory number']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('NomenclatureEquipment', 'Nomenclature Equipment') !!}
                        {!! Form::text('NomenclatureEquipment', null, ['class' => 'form-control', 'placeholder' => 'Write nomenclature']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('DescriptionEquipment', 'Description') !!}
                        {!! Form::text('DescriptionEquipment', null, ['class' => 'form-control', 'placeholder' => 'Write description']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('BrandEquipment', 'Brand Equipment') !!}
                        {!! Form::text('BrandEquipment', null, ['class' => 'form-control', 'placeholder' => 'Write brand equipment']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('ModelEquipment', 'Model Equipment') !!}
                        {!! Form::text('ModelEquipment', null, ['class' => 'form-control', 'placeholder' => 'Write model equipment']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('SerialNumberEquipment', 'Serial Number Equipment') !!}
                        {!! Form::text('SerialNumberEquipment', null, ['class' => 'form-control', 'placeholder' => 'Write serial number']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('ColorEquipment', 'Color Equipment') !!}
                        {!! Form::text('ColorEquipment', null, ['class' => 'form-control', 'placeholder' => 'Write color equipment']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('DescriptionAdEquipment', 'Description add') !!}
                        {!! Form::text('DescriptionAdEquipment', null, ['class' => 'form-control', 'placeholder' => 'Write description add']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('TypeEquipment', 'Type Equipment') !!}
                        {!! Form::text('TypeEquipment', null, ['class' => 'form-control', 'placeholder' => 'Write type equipment']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('TypeAssemblyEquipment', 'TypeAssembly Equipment') !!}
                        {!! Form::text('TypeAssemblyEquipment', null, ['class' => 'form-control', 'placeholder' => 'Write type assembly']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('OSEquipment', 'OS Equipment') !!}
                        {!! Form::text('OSEquipment', null, ['class' => 'form-control', 'placeholder' => 'Write OS equipment']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('IPAddressEquipment', 'IP Address') !!}
                        {!! Form::text('IPAddressEquipment', null, ['class' => 'form-control', 'placeholder' => 'Write IP address']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('BrandMotherB', 'Brand Motherboard') !!}
                        {!! Form::text('BrandMotherB', null, ['class' => 'form-control', 'placeholder' => 'Write brand motherboard']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('ModelMotherB', 'Model Motherboard') !!}
                        {!! Form::text('ModelMotherB', null, ['class' => 'form-control', 'placeholder' => 'Write model motherboard']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('SerialNumberMotherB', 'Serial Number Motherboard') !!}
                        {!! Form::text('SerialNumberMotherB', null, ['class' => 'form-control', 'placeholder' => 'Write serial number motherboard']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('BrandCPU', 'Brand CPU') !!}
                        {!! Form::text('BrandCPU', null, ['class' => 'form-control', 'placeholder' => 'Write brand CPU']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('ModelCPU', 'Model CPU') !!}
                        {!! Form::text('ModelCPU', null, ['class' => 'form-control', 'placeholder' => 'Write model CPU']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('FrequencyCPU', 'Frequency CPU') !!}
                        {!! Form::text('FrequencyCPU', null, ['class' => 'form-control', 'placeholder' => 'Write frequency CPU']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('BrandRam', 'Brand RAM') !!}
                        {!! Form::text('BrandRam', null, ['class' => 'form-control', 'placeholder' => 'Write brand RAM']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('TypeRam', 'Type RAM') !!}
                        {!! Form::text('TypeRam', null, ['class' => 'form-control', 'placeholder' => 'Write type RAM']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('CapabilityRam', 'Capability RAM') !!}
                        {!! Form::text('CapabilityRam', null, ['class' => 'form-control', 'placeholder' => 'Write capability RAM']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('TypeHHD', 'Type HHD') !!}
                        {!! Form::text('TypeHHD', null, ['class' => 'form-control', 'placeholder' => 'Write type HDD']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('BrandHHD', 'Brand HHD') !!}
                        {!! Form::text('BrandHHD', null, ['class' => 'form-control', 'placeholder' => 'Write brand HDD']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('ModelHHD', 'Model HHD') !!}
                        {!! Form::text('ModelHHD', null, ['class' => 'form-control', 'placeholder' => 'Write model HDD']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('CapabilityHHD', 'Capability HHD') !!}
                        {!! Form::text('CapabilityHHD', null, ['class' => 'form-control', 'placeholder' => 'Write capability HHD']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('SerialNumberHHD', 'Serial Number HHD') !!}
                        {!! Form::text('SerialNumberHHD', null, ['class' => 'form-control', 'placeholder' => 'Write serial number HDD']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('BrandDiscReader', 'Brand Disc Reader') !!}
                        {!! Form::text('BrandDiscReader', null, ['class' => 'form-control', 'placeholder' => 'Write brand disc reader']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('TypeDiscReader', 'Type Disc Reader') !!}
                        {!! Form::text('TypeDiscReader', null, ['class' => 'form-control', 'placeholder' => 'Write type disc reader']) !!}
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



