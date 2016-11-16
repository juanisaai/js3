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
                                JURISDICCION SANITARIA No. III</strong>
                            <br>
                            <strong>DEPARTAMENTO DE INFORMÁTICA Y SISTEMAS
                                <br>
                                Reporte de Inventarios de Equipos y Accesorios
                            </strong></p>
                    </td>
                </tr>
            </table>

            <table class="font2 dimtable2 margintab">

                <tr>
                    <th class="space9"><strong>Usuario: </strong> <ins class="upper2">{{ $employee->full_name }}</ins></th>
                    <th class="space8"><strong>Nombre Equipo: </strong> <ins class="upper2">{{ $equipment->NomenclatureEquipment }}</ins></th>
                    <th class="space8"><strong>Dirección IP: </strong> <ins class="upper2">{{ $equipment->IPAddressEquipment }}</ins></th>
                <th class="space3"></th>
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
                <td class="bordertable">{{ $equipment->TypeEquipment }}</td>
                <td class="bordertable">{{ $equipment->TypeAssemblyEquipment }}</td>
                <td class="bordertable">{{ $equipment->BrandEquipment }}</td>
                <td class="bordertable">{{ $equipment->ModelEquipment }}</td>
                @if(($equipment->InventoryNumberEquipment) === null)
                    <td class="bordertable">{{ $equipment->SerialNumberEquipment }}</td>
                @else
                    <td class="bordertable">{{ $equipment->InventoryNumberEquipment }}</td>
                @endif
            </tr>
        </table>

        <table class="font dimtable2 bordertable3">
            <tr class="upper">
                <th class="color bordertable2" style="width:10%">S.O.</th>
                <td class="bordertable" style="width:20%">{{ $equipment->EquipmentSO }}</td>
                <td class="bordertable" style="width:15%">{{ $equipment->ArchitectureOS }}</td>
                <td class="bordertable" style="width:20%">{{ $equipment->DistributionOS }}</td>
                <td style="width:15%"></td>
                @if(($equipment->InventoryNumberOS) === null)
                    <td class="bordertable" style="width:20%">{{ $equipment->SerialNumberOS }}</td>
                @else
                    <td class="bordertable" style="width:20%">{{ $equipment->InventoryNumberOS }}</td>
                @endif
            </tr>
        </table>
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
                <td class="bordertable">{{ $equipment->BrandMotherB }}</td>
                <td class="bordertable">{{ $equipment->ModelMotherB }}</td>
                <td class="bordertable">{{ $equipment->SerialNumberMotherB }}</td>
            </tr>
        </table>
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
                <td class="bordertable">{{ $equipment->BrandCPU }}</td>
                <td class="bordertable">{{ $equipment->ModelCPU }}</td>
                <td class="bordertable">{{ $equipment->FrequencyCPU }}</td>
            </tr>
        </table>
        <table class="font dimtable2 bordertable3">
            <tr>
                <td class="textp"><strong>Lector Óptico</strong></td>
            </tr>
            <tr>
                <th>Marca</th>
                <th>Tipo</th>
            </tr>
            <tr class="upper">
                <td class="bordertable" style="width:25%">{{ $equipment->BrandDiscReader }}</td>
                <td class="bordertable" style="width:25%">{{ $equipment->TypeDiscReader }}</td>
            </tr>
        </table>
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
                <td class="bordertable">{{ $equipment->TypeHHD }}</td>
                <td class="bordertable">{{ $equipment->BrandHHD }}</td>
                <td class="bordertable">{{ $equipment->ModelHHD }}</td>
                <td class="bordertable">{{ $equipment->CapabilityHHD }}</td>
                <td class="bordertable">{{ $equipment->SerialNumberHHD }}</td>
            </tr>
        </table>
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
                <td class="bordertable">{{ $equipment->BrandRam }}</td>
                <td class="bordertable">{{ $equipment->TypeRam }}</td>
                <td class="bordertable">{{ $equipment->CapabilityRam }}</td>
            </tr>
        </table>

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
