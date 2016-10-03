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
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Data equipment
                            <a href="{{ route('createEquipment') }}">Create
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        </div>
                        <div class="panel-body table-responsive">

                            @include('partials/errors')
                            @include('partials/succeed')

                            <table class="table">
                                <tr>
                                    <th>Inventory number</th>
                                    <th>Nomenclature</th>
                                    <th>Description</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Serial number</th>
                                    <th>Color</th>
                                    <th>Description add</th>
                                    <th>Type</th>
                                    <th>Type assembly</th>
                                    <th>Brand PC</th>
                                    <th>Model PC</th>
                                    <th>Color PC</th>
                                    <th>Inventory Number PC</th>
                                    <th>Serial Number PC</th>
                                    <th>OS PC</th>
                                    <th>Nomenclature PC</th>
                                    <th>IP Address</th>
                                    <th>Brand MB</th>
                                    <th>Model MB</th>
                                    <th>Serial number MB</th>
                                    <th>Brand CPU</th>
                                    <th>Model CPU</th>
                                    <th>Frequency CPU</th>
                                    <th>Brand RAM</th>
                                    <th>Type RAM</th>
                                    <th>Capability RAM</th>
                                    <th>Type HHD</th>
                                    <th>Brand HHD</th>
                                    <th>Model HHD</th>
                                    <th>Capability HHD</th>
                                    <th>Serial number HHD</th>
                                    <th>Brand Disc Reader</th>
                                    <th>Type Disc Reader</th>

                                    <tr>
                                        <td>{{ $equipment->InventoryNumberEquipment }}</td>
                                        <td>{{ $equipment->NomenclatureEquipment }}</td>
                                        <td>{{ $equipment->DescriptionEquipment }}</td>
                                        <td>{{ $equipment->BrandEquipment }}</td>
                                        <td>{{ $equipment->ModelEquipment }}</td>
                                        <td>{{ $equipment->SerialNumberEquipment }}</td>
                                        <td>{{ $equipment->ColorEquipment }}</td>
                                        <td>{{ $equipment->DescriptionAdEquipment }}</td>


                                        <td>{{ $equipment->TypeEquipment }}</td>
                                        <td>{{ $equipment->TypeAssemblyEquipment }}</td>
                                        <td>{{ $equipment->BrandEquipment }}</td>
                                        <td>{{ $equipment->ModelEquipment }}</td>
                                        <td>{{ $equipment->ColorEquipment }}</td>
                                        <td>{{ $equipment->InventoryNumberEquipment }}</td>
                                        <td>{{ $equipment->SerialNumberEquipment }}</td>
                                        <td>{{ $equipment->OSEquipment }}</td>
                                        <td>{{ $equipment->NomenclatureEquipment }}</td>
                                        <td>{{ $equipment->IPAddressEquipment }}</td>
                                        <td>{{ $equipment->BrandMotherB }}</td>
                                        <td>{{ $equipment->ModelMotherB }}</td>
                                        <td>{{ $equipment->SerialNumberMotherB }}</td>
                                        <td>{{ $equipment->BrandCPU }}</td>
                                        <td>{{ $equipment->ModelCPU }}</td>
                                        <td>{{ $equipment->FrequencyCPU }}</td>
                                        <td>{{ $equipment->BrandRam }}</td>
                                        <td>{{ $equipment->TypeRam }}</td>
                                        <td>{{ $equipment->CapabilityRam }}</td>
                                        <td>{{ $equipment->TypeHHD }}</td>
                                        <td>{{ $equipment->BrandHHD }}</td>
                                        <td>{{ $equipment->ModelHHD }}</td>
                                        <td>{{ $equipment->CapabilityHHD }}</td>
                                        <td>{{ $equipment->SerialNumberHHD }}</td>
                                        <td>{{ $equipment->BrandDiscReader }}</td>
                                        <td>{{ $equipment->TypeDiscReader }}</td>

                                    </tr>
                            </table>


                        </div>
    @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
