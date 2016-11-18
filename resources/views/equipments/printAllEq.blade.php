@extends('layouts.print')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="footer font4">
            Página <span class="pagenum"></span>
        </div>

            {{ Html::image('images/logosalud.png', "Imagen no encontrada", array('id' => 'logoqroo', 'title' => 'Logo Quintana Roo', 'class' => 'qroolog')) }}
            {{ Html::image('images/logoqroo.png', "Imagen no encontrada", array('id' => 'logosalud', 'title' => 'Logo Salud', 'class' => 'safelog2')) }}

            <table class="font dimtable3 margintab">
                <tr>
                    <td>
                        <p class="titulo">
                            <strong>INVENTARIO DE EQUIPOS DE CÓMPUTO
                                <br>
                                JURISDICCION SANITARIA No. III</strong>
                            </p>
                    </td>
                </tr>
            </table>

            <table class="dimtable3 bordertable2">
                <tbody>
            <tr class="font4">
                <th class="color" style="width:5%">N. DE INVENTARIO</th>
                <th class="color" style="width:5%">NOMENCLATURA</th>
                <th class="color" style="width:12%">DESCRIPCIÓN DEL BIEN</th>
                <th class="color" style="width:6%">COLOR</th>
                <th class="color" style="width:8%">MARCA</th>
                <th class="color" style="width:8%">TIPO</th>
                <th class="color" style="width:10%">MODELO</th>
                <th class="color" style="width:10%">N. DE SERIE</th>
                <th class="color" style="width:10%">DESCRIP. ADICIONAL</th>
                <th class="color" style="width:10%">USUARIO</th>
                <th class="color" style="width:14%">UBICACIÓN</th>
            </tr>
                @foreach($equipments as $equipment)
                    <tr class="upper font3 txtalign">
                        <td class="bordertable">{{ $equipment->InventoryNumberEquipment }}</td>
                        <td class="bordertable">{{ $equipment->NomenclatureEquipment }}</td>
                        <td class="bordertable">{{ $equipment->DescriptionEquipment }}</td>
                        <td class="bordertable">{{ $equipment->ColorEquipment }}</td>
                        <td class="bordertable">{{ $equipment->BrandEquipment }}</td>
                        <td class="bordertable">{{ $equipment->TypeEquipment }}</td>
                        <td class="bordertable">{{ $equipment->ModelEquipment }}</td>
                        <td class="bordertable">{{ $equipment->SerialNumberEquipment }}</td>
                        <td class="bordertable">{{ $equipment->DescriptionAdEquipment }}</td>
                        <td class="bordertable">{{ $equipment->employee->full_name }}</td>
                        <td class="bordertable">{{ $equipment->employee->name_area }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    @endif

@endsection
