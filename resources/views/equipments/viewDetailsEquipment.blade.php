@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Detalles de equipo: <strong>{{ $equipment->InventoryNumberEquipment }}</strong></h1>
                        </div>
                            <div class="panel-body table-responsive table-hover table-striped">

                            @include('partials/errors')
                            @include('partials/succeed')

                            <table class="table">
                                <tr>

                                    <th>Número de inventario</th>
                                    <th>Nomenclatura</th>
                                    <th>Descripción</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Número de serie</th>
                                    <th>Color</th>
                                    <th>Descripción adicional</th>
                                    <th>Tipo de equipo</th>
                                    <th>Tipo de ensamble</th>
                                    <th>Sistema operativo</th>
                                    <th>Arquitectura de S.O.</th>
                                    <th>Distribución de S.O.</th>
                                    <th>No. Serie de S.O.</th>
                                    <th>No Inventario de S.O.</th>
                                    <th>Dirección IP</th>
                                    <th>Marca de tarjeta madre</th>
                                    <th>Modelo de tarjeta madre</th>
                                    <th>Número de serie de tarjeta madre</th>
                                    <th>Marca de CPU</th>
                                    <th>Modelo de CPU</th>
                                    <th>Frecuencia de CPU</th>
                                    <th>Marca de RAM</th>
                                    <th>Tipo de RAM</th>
                                    <th>Capacidad de RAM</th>
                                    <th>Marca de HHD</th>
                                    <th>Modelo de HHD</th>
                                    <th>Tipo de HHD</th>
                                    <th>Capacidad de HHD</th>
                                    <th>Número de serie de HHD</th>
                                    <th>Marca del lector de CD</th>
                                    <th>Tipo de lector</th>
                                    <th>Equipo activo</th>
                                </tr>

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
                                        <td>{{ $equipment->EquipmentSO }}</td>
                                        <td>{{ $equipment->ArchitectureOS }}</td>
                                        <td>{{ $equipment->DistributionOS }}</td>
                                        <td>{{ $equipment->SerialNumberOS }}</td>
                                        <td>{{ $equipment->InventoryNumberOS }}</td>
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
                                        <td>
                                            @if( ($equipment->active) === 1)
                                                Activo
                                            @elseif(($equipment->active) === 0)
                                                Desactivado
                                            @endif
                                        </td>
                                </tr>
                            </table>
                        </div>
    @endif
                    </div>
                    <div class="form-group pull-left">
                        <a class="btn btn-success btn-close" href="{{ route('readEquipments') }}">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
@endsection
