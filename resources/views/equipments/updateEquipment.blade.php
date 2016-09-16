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
                    <div class="panel-heading">Update employee</div>

                    <div class="panel-body">

                        @include('partials/errors')
                        @include('partials/succeed')

                        {!! Form::model(array($equipment, [
                            'method' => 'PATCH',
                            'route'  => ['updateEquipment', $equipment->id]
                        ])) !!}

                        <div class="form-group">
                            {!! Form::label('TypeEquipment', 'Type Equipment') !!}
                            {!! Form::text('TypeEquipment', $equipment->TypeEquipment, ['class' => 'form-control', 'placeholder' => 'Write type equipment']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('TypeAssemblyEquipment', 'TypeAssembly Equipment') !!}
                            {!! Form::text('TypeAssemblyEquipment', $equipment->TypeAssemblyEquipment, ['class' => 'form-control', 'placeholder' => 'Write type assembly']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('BrandEquipment', 'Brand Equipment') !!}
                            {!! Form::text('BrandEquipment', $equipment->BrandEquipment, ['class' => 'form-control', 'placeholder' => 'Write brand equipment']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('ModelEquipment', 'Model Equipment') !!}
                            {!! Form::text('ModelEquipment', $equipment->ModelEquipment, ['class' => 'form-control', 'placeholder' => 'Write model equipment']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('ColorEquipment', 'Color Equipment') !!}
                            {!! Form::text('ColorEquipment', $equipment->ColorEquipment, ['class' => 'form-control', 'placeholder' => 'Write color equipment']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('InventoryNumberEquipment', 'Inventory Number Equipment') !!}
                            {!! Form::text('InventoryNumberEquipment', $equipment->InventoryNumberEquipment, ['class' => 'form-control', 'placeholder' => 'Write inventory number']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('SerialNumberEquipment', 'Serial Number Equipment') !!}
                            {!! Form::text('SerialNumberEquipment', $equipment->SerialNumberEquipment, ['class' => 'form-control', 'placeholder' => 'Write serial number']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('OSEquipment', 'OS Equipment') !!}
                            {!! Form::text('OSEquipment', $equipment->OSEquipment, ['class' => 'form-control', 'placeholder' => 'Write OS equipment']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('NomenclatureEquipment', 'Nomenclature Equipment') !!}
                            {!! Form::text('NomenclatureEquipment', $equipment->NomenclatureEquipment, ['class' => 'form-control', 'placeholder' => 'Write nomenclature']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('IPAddressEquipment', 'IP Address') !!}
                            {!! Form::text('IPAddressEquipment', $equipment->IPAddressEquipment, ['class' => 'form-control', 'placeholder' => 'Write IP address']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('BrandMotherB', 'Brand Motherboard') !!}
                            {!! Form::text('BrandMotherB', $equipment->BrandMotherB, ['class' => 'form-control', 'placeholder' => 'Write brand motherboard']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('ModelMotherB', 'Model Motherboard') !!}
                            {!! Form::text('ModelMotherB', $equipment->ModelMotherB, ['class' => 'form-control', 'placeholder' => 'Write model motherboard']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('SerialNumberMotherB', 'Serial Number Motherboard') !!}
                            {!! Form::text('SerialNumberMotherB', $equipment->SerialNumberMotherB, ['class' => 'form-control', 'placeholder' => 'Write serial number motherboard']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('BrandCPU', 'Brand CPU') !!}
                            {!! Form::text('BrandCPU', $equipment->BrandCPU, ['class' => 'form-control', 'placeholder' => 'Write brand CPU']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('ModelCPU', 'Model CPU') !!}
                            {!! Form::text('ModelCPU', $equipment->ModelCPU, ['class' => 'form-control', 'placeholder' => 'Write model CPU']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('FrequencyCPU', 'Frequency CPU') !!}
                            {!! Form::text('FrequencyCPU', $equipment->FrequencyCPU, ['class' => 'form-control', 'placeholder' => 'Write frequency CPU']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('BrandRam', 'Brand RAM') !!}
                            {!! Form::text('BrandRam', $equipment->BrandRam, ['class' => 'form-control', 'placeholder' => 'Write brand RAM']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('TypeRam', 'Type RAM') !!}
                            {!! Form::text('TypeRam', $equipment->TypeRam, ['class' => 'form-control', 'placeholder' => 'Write type RAM']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('CapabilityRam', 'Capability RAM') !!}
                            {!! Form::text('CapabilityRam', $equipment->CapabilityRam, ['class' => 'form-control', 'placeholder' => 'Write capability RAM']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('TypeHHD', 'Type HHD') !!}
                            {!! Form::text('TypeHHD', $equipment->TypeHHD, ['class' => 'form-control', 'placeholder' => 'Write type HDD']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('BrandHHD', 'Brand HHD') !!}
                            {!! Form::text('BrandHHD', $equipment->BrandHHD, ['class' => 'form-control', 'placeholder' => 'Write brand HDD']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('ModelHHD', 'Model HHD') !!}
                            {!! Form::text('ModelHHD', $equipment->ModelHHD, ['class' => 'form-control', 'placeholder' => 'Write model HDD']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('CapabilityHHD', 'Capability HHD') !!}
                            {!! Form::text('CapabilityHHD', $equipment->CapabilityHHD, ['class' => 'form-control', 'placeholder' => 'Write capability HHD']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('SerialNumberHHD', 'Serial Number HHD') !!}
                            {!! Form::text('SerialNumberHHD', $equipment->SerialNumberHHD, ['class' => 'form-control', 'placeholder' => 'Write serial number HDD']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('BrandDiscReader', 'Brand Disc Reader') !!}
                            {!! Form::text('BrandDiscReader', $equipment->BrandDiscReader, ['class' => 'form-control', 'placeholder' => 'Write brand disc reader']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('TypeDiscReader', 'Type Disc Reader') !!}
                            {!! Form::text('TypeDiscReader', $equipment->TypeDiscReader, ['class' => 'form-control', 'placeholder' => 'Write type disc reader']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('supplier_id', 'Select supplier') !!}
                            {{ Form::select('supplier_id', $suppliers) }}
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



