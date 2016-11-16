@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="col-xs-10 col-md-1 pull-left">
                            {{ Html::image('images/images-oficial/logosalud.png', "Imagen no encontrada", array('id' => 'logoqroo', 'title' => 'Logo Quintana Roo')) }}
                        </div>
                        <div class="col-xs-10 col-md-4 pull-right">
                            {{ Html::image('images/images-oficial/logoqroo.png', "Imagen no encontrada", array('id' => 'logosalud', 'title' => 'Logo Salud')) }}
                        </div>
                    </div>

                    <p class="text-center">
                        <strong>SERVICIOS ESTATALES DE SALUD
                            <br>
                        JURISDICCION SANITARIA No. III</strong>
                            <br>
                        <strong>DEPARTAMENTO DE INFORMÁTICA Y SISTEMAS
                            <br>
                            Reporte de Inventarios de Equipos y Accesorios
                        </strong></p>

                    <table class="table treceptiondate">

                        <tr>
                            <td class="space"><strong>Usuario: </strong></td>
                            <td><ins>{{ $employee->full_name }}</ins></td>
                            <td class="space3"><strong>Nombre Equipo: </strong></td>
                            <td><ins>{{ $equipment->NomenclatureEquipment }}</ins></td>
                            <td class="space3"><strong>Dirección IP: </strong></td>
                            <td><ins>{{ $equipment->IPAddressEquipment }}</ins></td>

                        </tr>
                        <tr>
                            <td class="space"><strong>Dirección: </strong></td>
                            <td><strong><ins>{{ $employee->area->DirectorateArea }}</ins></strong></td>
                        </tr>
                        <tr>
                            <td class="space"><strong>Área: </strong></td>
                            <td><ins>{{ $employee->area->NameArea }}</ins></td>
                        </tr>

                    </table>

                    <table class="table treception">
                        <tr>
                            <th class="color">Equipo</th>
                            <th class="color">Tipo</th>
                            <th class="color">Marca</th>
                            <th class="color">Modelo</th>
                            <th class="color">No. de inventario/No. de serie</th>
                        </tr>
                        <tr>
                            <td>{{ $equipment->TypeEquipment }}</td>
                            <td>{{ $equipment->TypeAssemblyEquipment }}</td>
                            <td>{{ $equipment->BrandEquipment }}</td>
                            <td>{{ $equipment->ModelEquipment }}</td>
                            @if(($equipment->InventoryNumberEquipment) === null)
                                <td>{{ $equipment->SerialNumberEquipment }}</td>
                            @else
                                <td>{{ $equipment->InventoryNumberEquipment }}</td>
                            @endif
                        </tr>
                    </table>

                    <table class="table treception">
                        <tr>
                            <th class="color">S.O.</th>
                            <th class="color">Arquitectura</th>
                            <th class="color">Distribución</th>
                            <th class="color">No. de inventario/No. de serie</th>
                        </tr>
                        <tr>
                            <td>{{ $equipment->EquipmentSO }}</td>
                            <td>{{ $equipment->ArchitectureOS }}</td>
                            <td>{{ $equipment->DistributionOS }}</td>
                            @if(($equipment->InventoryNumberOS) === null)
                                <td>{{ $equipment->SerialNumberOS }}</td>
                            @else
                                <td>{{ $equipment->InventoryNumberOS }}</td>
                            @endif
                        </tr>
                    </table>
                    <table class="table treceptiondate">
                        <tr>
                            <td class="text-center" colspan="3"><strong>Tarjeta Madre</strong></td>
                        </tr>
                        <tr class="treception">
                            <th class="color">Marca</th>
                            <th class="color">Modelo</th>
                            <th class="color">No. de Serie</th>
                        </tr>
                        <tr class="treception">
                            <td>{{ $equipment->BrandMotherB }}</td>
                            <td>{{ $equipment->ModelMotherB }}</td>
                            <td>{{ $equipment->SerialNumberMotherB }}</td>
                        </tr>
                    </table>
                    <table class="table treceptiondate">
                        <tr>
                            <td class="text-center" colspan="3"><strong>Procesador</strong></td>
                        </tr>
                        <tr class="treception">
                            <th class="color">Marca</th>
                            <th class="color">Modelo</th>
                            <th class="color">Frecuencia</th>
                        </tr>
                        <tr class="treception">
                            <td>{{ $equipment->BrandCPU }}</td>
                            <td>{{ $equipment->ModelCPU }}</td>
                            <td>{{ $equipment->FrequencyCPU }}</td>
                        </tr>
                    </table>

                    <table class="table treceptiondate">
                        <tr>
                            <td class="text-center" colspan="2"><strong>Lector Óptico</strong></td>
                        </tr>
                        <tr class="treception">
                            <th class="color">Marca</th>
                            <th class="color">Tipo</th>
                        </tr>
                        <tr class="treception">
                            <td>{{ $equipment->BrandDiscReader }}</td>
                            <td>{{ $equipment->TypeDiscReader }}</td>
                        </tr>
                    </table>

                    <table class="table treceptiondate">
                        <tr>
                            <td class="text-center" colspan="5"><strong>Disco Duro</strong></td>
                        </tr>
                        <tr class="treception">
                            <th class="color">Tipo</th>
                            <th class="color">Marca</th>
                            <th class="color">Modelo</th>
                            <th class="color">Capacidad</th>
                            <th class="color">No. de Serie</th>
                        </tr>
                        <tr class="treception">
                            <td>{{ $equipment->TypeHHD }}</td>
                            <td>{{ $equipment->BrandHHD }}</td>
                            <td>{{ $equipment->ModelHHD }}</td>
                            <td>{{ $equipment->CapabilityHHD }}</td>
                            <td>{{ $equipment->SerialNumberHHD }}</td>
                        </tr>
                    </table>

                    <table class="table treceptiondate">
                        <tr>
                            <td class="text-center" colspan="3"><strong>Memoria RAM</strong></td>
                        </tr>
                        <tr class="treception">
                            <th class="color">Marca</th>
                            <th class="color">Tipo</th>
                            <th class="color">Capacidad</th>
                        </tr>
                        <tr class="treception">
                            <td>{{ $equipment->BrandRam }}</td>
                            <td>{{ $equipment->TypeRam }}</td>
                            <td>{{ $equipment->CapabilityRam }}</td>
                        </tr>
                    </table>

                    <table>
                        <tr>
                            <td><p class="text-center">________________________________</p></td>
                        </tr>

                        <tr>
                            <td>
                                <p class="text-center">Firma</p>
                                <p class="text-center">{{ $employee->full_name }}</p>
                            </td>
                        </tr>
                    </table>

                    @endif
                </div>
            </div>
            <div class="form-group pull-left">
                <a class="btn btn-success btn-close" href="{{ route('seeDetailsAssignEq', ['id' => $employee->id]) }}">Regresar</a>
            </div>
            <div class="form-group pull-right">
                <a href="{{ route('printInvEq', ['id' => $equipment->id, 'idEmp' => $employee->id]) }}"><button type="button" class="btn btn-info btn-sm">Imprimir</button></a>
            </div>
        </div>
@endsection
