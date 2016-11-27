@extends('layouts.print')

@section('content')

    @if (Auth::guest())

        @include('partials.login')

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
                            <strong>INVENTARIO DE IMPRESORAS
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
                @foreach($devices as $device)
                    <tr class="upper font3 txtalign">
                        <td class="bordertable">{{ $device->InventoryNumberDevice }}</td>
                        <td class="bordertable">{{ $device->NomenclatureDevice }}</td>
                        <td class="bordertable">{{ $device->DescriptionDevice }}</td>
                        <td class="bordertable">{{ $device->ColorDevice }}</td>
                        <td class="bordertable">{{ $device->BrandDevice }}</td>
                        <td class="bordertable">{{ $device->TypeDevice }}</td>
                        <td class="bordertable">{{ $device->ModelDevice }}</td>
                        <td class="bordertable">{{ $device->SerialNumberDevice }}</td>
                        <td class="bordertable">{{ $device->DescriptionAdDevice }}</td>
                        @if(empty($device->employee->full_name))
                            <td class="bordertable">Aún sin asignar</td>
                        @else
                            <td class="bordertable">{{ $device->employee->full_name }}</td>
                        @endif

                        @if(empty($device->employee->name_area))
                            <td class="bordertable">Aún sin asignar</td>
                        @else
                            <td class="bordertable">{{ $device->employee->name_area }}</td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
    @endif

@endsection
