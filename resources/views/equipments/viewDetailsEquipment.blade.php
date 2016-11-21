@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Detalles de equipo <span class="label label-default">{{ $equipment->NomenclatureEquipment }}</span></h2>

                    @if( ($equipment->active) === 1)
                        <h4><span class="label label-success">Equipo activo</span></h4>
                    @elseif(($equipment->active) === 0)
                        <h4><span class="label label-danger">Equipo desactivado</span></h4>
                    @endif

                    <div class="det-Title">
                        <a href="{{ route('editEquipment', ['id' => $equipment->id]) }}" class="det-Title"><button type="button" class="btn btn-warning btn-sm">Editar</button></a>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Datos generales del equipo</h1>
                        </div>
                            <div class="panel-body table-responsive">
                                <table class="table table-hover">
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
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Datos del sistema operativo</h1>
                        </div>
                        <div class="panel-body table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>Sistema operativo</th>
                                    <th>Arquitectura de S.O.</th>
                                    <th>Distribución de S.O.</th>
                                    <th>No. Serie de S.O.</th>
                                    <th>No Inventario de S.O.</th>
                                    <th>Dirección IP</th>
                                </tr>

                                <tr>
                                    <td>{{ $equipment->EquipmentOS }}</td>
                                    <td>{{ $equipment->ArchitectureOS }}</td>
                                    <td>{{ $equipment->DistributionOS }}</td>
                                    <td>{{ $equipment->SerialNumberOS }}</td>
                                    <td>{{ $equipment->InventoryNumberOS }}</td>
                                    <td>{{ $equipment->IPAddressEquipment }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Datos de tarjeta madre, CPU y Memoria RAM</h1>
                        </div>
                        <div class="panel-body table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>Marca de tarjeta madre</th>
                                    <th>Modelo de tarjeta madre</th>
                                    <th>Número de serie de tarjeta madre</th>
                                    <th>Marca de CPU</th>
                                    <th>Modelo de CPU</th>
                                    <th>Frecuencia de CPU</th>
                                    <th>Marca de RAM</th>
                                    <th>Tipo de RAM</th>
                                    <th>Capacidad de RAM</th>
                                </tr>

                                <tr>
                                    <td>{{ $equipment->BrandMotherB }}</td>
                                    <td>{{ $equipment->ModelMotherB }}</td>
                                    <td>{{ $equipment->SerialNumberMotherB }}</td>
                                    <td>{{ $equipment->BrandCPU }}</td>
                                    <td>{{ $equipment->ModelCPU }}</td>
                                    <td>{{ $equipment->FrequencyCPU }}</td>
                                    <td>{{ $equipment->BrandRam }}</td>
                                    <td>{{ $equipment->TypeRam }}</td>
                                    <td>{{ $equipment->CapabilityRam }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Datos de disco duro y lector de CD</h1>
                        </div>
                        <div class="panel-body table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>Marca de HHD</th>
                                    <th>Modelo de HHD</th>
                                    <th>Tipo de HHD</th>
                                    <th>Capacidad de HHD</th>
                                    <th>Número de serie de HHD</th>
                                    <th>Marca del lector de CD</th>
                                    <th>Tipo de lector</th>
                                </tr>

                                <tr>
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
                    </div>



                    @endif

                    <div class="form-group pull-left">
                        <a class="btn btn-success btn-close" href="{{ route('readEquipments') }}">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
@endsection
