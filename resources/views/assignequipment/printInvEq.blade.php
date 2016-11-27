@extends('layouts.print')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else


        {{ Html::image('images/logosalud.png', "Imagen no encontrada", array('id' => 'logoqroo', 'title' => 'Logo Quintana Roo', 'class' => 'qroolog')) }}
        {{ Html::image('images/logoqroo.png', "Imagen no encontrada", array('id' => 'logosalud', 'title' => 'Logo Salud', 'class' => 'safelog')) }}

            <table class="font dimtable2 margintab">
                <tr>
                    <td>
                        <p class="titulo">
                            <strong>SERVICIOS ESTATALES DE SALUD
                                <br>
                                JURISDICCION SANITARIA No. III
                            <br>
                            DEPARTAMENTO DE INFORMÁTICA Y SISTEMAS</strong>
                                <br>
                            <strong style="font-style: italic;">Reporte de Inventarios de Equipos y Accesorios</strong>
                        </p>
                    </td>
                </tr>
            </table>

            <table class="font2 dimtable2 margin10">
                <tr>
                    <th class="space9"><strong>Usuario: </strong> <ins class="upper2">{{ $employee->full_name }}</ins></th>
                    <th class="space9"><strong>Nombre Equipo: </strong> <ins class="upper2">{{ $equipment->NomenclatureEquipment }}</ins></th>
                    <th class="space9"><strong>Dirección IP: </strong> <ins class="upper2">{{ $equipment->IPAddressEquipment }}</ins></th>
                </tr>
            </table>

            <table class="font2 dimtable2 margintab">
                <tr>
                    <th class="space9"><strong>Dirección: </strong> <ins class="upper2">{{ $employee->area->DirectorateArea }}</ins></th>
                </tr>
                <tr>
                    <th class="space9"><strong>Área: </strong> <ins class="upper2">{{ $employee->area->NameArea }}</ins></th>
                </tr>

            </table>

            <table class="font dimtable2 bordertable2">
            <tr>
                <th class="color" style="width:30%">Equipo</th>
                <th class="color" style="width:15%">Tipo</th>
                <th class="color" style="width:20%">Marca</th>
                <th class="color" style="width:15%">Modelo</th>
                <th class="color" style="width:20%">No. de inventario/No. de serie</th>
            </tr>
            <tr class="upper">
                <td class="bordertable p10">{{ trans('equipment.DescriptionEquipment.' . $equipment->DescriptionEquipment) }}</td>
                <td class="bordertable p10">{{ trans('equipment.TypeAssemblyEquipment.' . $equipment->TypeAssemblyEquipment) }}</td>
                <td class="bordertable p10">{{ $equipment->BrandEquipment }}</td>
                <td class="bordertable p10">{{ $equipment->ModelEquipment }}</td>
                @if(($equipment->InventoryNumberEquipment) === null)
                    <td class="bordertable p10">{{ $equipment->SerialNumberEquipment }}</td>
                @else
                    <td class="bordertable p10">{{ $equipment->InventoryNumberEquipment }}</td>
                @endif
            </tr>
        </table>


            @if(empty($equipment->EquipmentSO) or (($equipment->EquipmentSO) === 'N/A') or (($equipment->EquipmentSO) === null))
            @else
                <table class="font dimtable2 bordertable3">
                    <tr class="upper">
                        <th class="color bordertable2" style="width:10%">S.O.</th>
                        <td class="bordertable p10" style="width:20%">{{ $equipment->EquipmentSO }}</td>
                        <td class="bordertable p10" style="width:15%">{{ $equipment->ArchitectureOS }}</td>
                        <td class="bordertable p10" style="width:20%">{{ $equipment->DistributionOS }}</td>
                        <td style="width:15%"></td>
                        @if(($equipment->InventoryNumberOS) === null)
                            <td class="bordertable p10" style="width:20%">{{ $equipment->SerialNumberOS }}</td>
                        @else
                            <td class="bordertable p10" style="width:20%">{{ $equipment->InventoryNumberOS }}</td>
                        @endif
                    </tr>
                </table>
            @endif

            @if(empty($equipment->BrandMotherB) or (($equipment->BrandMotherB) === 'N/A') or (($equipment->BrandMotherB) === null))
            @else
                <table class="font dimtable2 bordertable3">
                    <tr>
                        <td class="textp"><strong>Tarjeta Madre</strong></td>
                    </tr>
                    <tr>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>No. de Serie</th>
                    </tr>
                    <tr class="upper">
                        <td class="bordertable p10">{{ $equipment->BrandMotherB }}</td>
                        <td class="bordertable p10">{{ $equipment->ModelMotherB }}</td>
                        <td class="bordertable p10">{{ $equipment->SerialNumberMotherB }}</td>
                    </tr>
                </table>
            @endif

        @if(empty($equipment->BrandCPU) or (($equipment->BrandCPU) === 'N/A') or (($equipment->BrandCPU) === null))
        @else
            <table class="font dimtable2 bordertable3">
                <tr>
                    <td class="textp"><strong>Procesador</strong></td>
                </tr>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Frecuencia</th>
                </tr>
                <tr class="upper">
                    <td class="bordertable p10">{{ $equipment->BrandCPU }}</td>
                    <td class="bordertable p10">{{ $equipment->ModelCPU }}</td>
                    <td class="bordertable p10">{{ $equipment->FrequencyCPU }}</td>
                </tr>
            </table>
        @endif

        @if(empty($equipment->BrandDiscReader) or (($equipment->BrandDiscReader) === 'N/A') or (($equipment->BrandDiscReader) === null))
        @else
            <table class="font dimtable2 bordertable3">
                <tr>
                    <td class="textp"><strong>Lector Óptico</strong></td>
                </tr>
                <tr>
                    <th>Marca</th>
                    <th>Tipo</th>
                </tr>
                <tr class="upper">
                    <td class="bordertable p10" style="width:25%">{{ $equipment->BrandDiscReader }}</td>
                    <td class="bordertable p10" style="width:25%">{{ $equipment->TypeDiscReader }}</td>
                </tr>
            </table>
        @endif

        @if(empty($equipment->BrandHHD) or (($equipment->BrandHHD) === 'N/A') or (($equipment->BrandHHD) === null))
        @else
            <table class="font dimtable2 bordertable3">
                <tr>
                    <td class="textp" colspan="2"><strong>Disco Duro</strong></td>
                </tr>
                <tr>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Capacidad</th>
                    <th>No. de Serie</th>
                </tr>
                <tr class="upper">
                    <td class="bordertable p10">{{ $equipment->TypeHHD }}</td>
                    <td class="bordertable p10">{{ $equipment->BrandHHD }}</td>
                    <td class="bordertable p10">{{ $equipment->ModelHHD }}</td>
                    <td class="bordertable p10">{{ $equipment->CapabilityHHD }}</td>
                    <td class="bordertable p10">{{ $equipment->SerialNumberHHD }}</td>
                </tr>
            </table>
        @endif

        @if(empty($equipment->BrandRam) or (($equipment->BrandRam) === 'N/A') or (($equipment->BrandRam) === null))
        @else
            <table class="font dimtable2 bordertable3">
                <tr>
                    <td class="textp"><strong>Memoria RAM</strong></td>
                </tr>
                <tr>
                    <th>Marca</th>
                    <th>Tipo</th>
                    <th>Capacidad</th>
                </tr>
                <tr class="upper">
                    <td class="bordertable p10">{{ $equipment->BrandRam }}</td>
                    <td class="bordertable p10">{{ $equipment->TypeRam }}</td>
                    <td class="bordertable p10">{{ $equipment->CapabilityRam }}</td>
                </tr>
            </table>
        @endif

            <table class="font dimtable2 margintab2">
                <tr>
                    <td>
                        <p class="textp upper sign">
                            ____________________________________
                            <br>
                            FIRMA
                            <br>
                            </br>{{ $employee->full_name }}</p>
                    </td>
                </tr>
            </table>


    @endif


@endsection
