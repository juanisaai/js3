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
                    <th class="space8"><strong>Nombre Equipo: </strong> <ins class="upper2">{{ $device->NomenclatureDevice }}</ins></th>
                <th class="space3"></th>
                </tr>
            </table>
            <table class="font2 dimtable2 margintab">
                <tr>
                    <th class="space9"><strong>Dirección: </strong> <ins class="upper2">{{ $employee->area->DirectorateArea }}</ins></th>
                    <th class="space9"><strong>Área: </strong> <ins class="upper2">{{ $employee->area->NameArea }}</ins></th>
                </tr>
            </table>

            <table class="font dimtable2 bordertable2">
            <tr>
                <th class="color" style="width:30%">Dispositivo</th>
                <th class="color" style="width:15%">Tipo</th>
                <th class="color" style="width:20%">Marca</th>
                <th class="color" style="width:15%">Modelo</th>
                <th class="color" style="width:20%">No. de inventario/No. de serie</th>
            </tr>
            <tr class="upper">
                <td class="bordertable">{{ $device->DescriptionDevice }}</td>
                <td class="bordertable">{{ $device->TypeDevice }}</td>
                <td class="bordertable">{{ $device->BrandDevice }}</td>
                <td class="bordertable">{{ $device->ModelDevice }}</td>
                @if(($device->InventoryNumberDevice) === null)
                    <td class="bordertable">{{ $device->SerialNumberDevice }}</td>
                @else
                    <td class="bordertable">{{ $device->InventoryNumberDevice }}</td>
                @endif
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
