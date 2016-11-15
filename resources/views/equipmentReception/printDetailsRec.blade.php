@extends('layouts.print')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

            {{ Html::image('images/logoqroo.png', "Imagen no encontrada", array('id' => 'logoqroo', 'title' => 'Logo Quintana Roo', 'class' => 'qroolog')) }}
            {{ Html::image('images/logosalud.png', "Imagen no encontrada", array('id' => 'logosalud', 'title' => 'Logo Salud', 'class' => 'safelog')) }}

<table class="font dimtable margintab">
    <tr>
        <td>
            <p class="titulo">HOJA DE RECEPCIÓN DE EQUIPO DE CÓMPUTO
                <br>COORDINACIÓN DE INFORMÁTICA</p>
        </td>
    </tr>
</table>

<table class="font dimtable margintab">
    <tr>
        <td><strong>Fecha de recepción:</strong>
            <ins>{{ $reception->created_at->toFormattedDateString() }}</ins>
        </td>
        <td><strong>Hora:</strong> {{ date('h:i:s A', strtotime($reception->created_at)) }}</td>
        <td><strong>Folio:</strong> {{ $reception->id }}</td>
    </tr>
</table>

<p class="font tittles"><strong>ÁREA QUE SOLICITA</strong></p>
<table class="font dimtable bordertable margintab">
    <tr>
        <td><strong>UNIDAD:</strong> <ins class="dimtext">{{ $employee->area->UnitArea }}</ins></td>
        <td><strong>EXT:</strong> <ins class="dimtext">{{ $employee->area->ExtensionArea }}</ins></td>
    </tr>
    <tr>
        <td><strong>DIRECCIÓN:</strong> <ins class="dimtext">{{ $employee->area->DirectorateArea }}</ins></td>
        <td><strong>NO. OFICIO:</strong> <ins class="dimtext">{{ $reception->NumberDoc }}</ins></td>
    </tr>
    <tr>
        <td>
            <strong>ÁREA:</strong> <ins class="dimtext">{{ $employee->area->NameArea }}</ins>
        </td>
    </tr>
</table>

<p class="font tittles"><strong>PROPIETARIO DEL EQUIPO</strong></p>
<table class="font dimtable bordertable margintab">
    <tr>
        <td class="dimtittle">{{ $reception->equipment->full_name }}</td>
    </tr>
</table>

<p class="font tittles"><strong>DATOS DEL EQUIPO</strong></p>
<table class="font dimtable bordertable margintab">
    <tr>
        <td class="upper"><strong>EQUIPO:</strong> {{ $reception->equipment->DescriptionEquipment }}</td>
        <td class="upper"><strong>NOMENCLATURA:</strong> {{ $reception->equipment->NomenclatureEquipment }}</td>
    </tr>
    <tr>
        <td class="upper"><strong>TIPO:</strong> {{ $reception->equipment->TypeEquipment }}</td>
        <td class="upper"><strong>NO DE SERIE:</strong> {{ $reception->equipment->SerialNumberEquipment }}</td>
    </tr>
    <tr>
        <td class="upper"><strong>MARCA:</strong> {{ $reception->equipment->BrandEquipment }}</td>
        <td class="upper"><strong>NO DE INVENTARIO:</strong> {{ $reception->equipment->InventoryNumberEquipment }}</td>
    </tr>
    <tr>
        <td class="upper"><strong>MODELO:</strong> {{ $reception->equipment->ModelEquipment }}</td>
        <td class="upper"><strong>COLOR:</strong> {{ $reception->equipment->ColorEquipment }}</td>
    </tr>
</table>

<table class="font dimtable margintxt">
    <tr>
        <td><strong>ESPECIFICACIÓN DEL TRABAJO:</strong></td>
        <td><strong>ACCESORIOS ADICIONALES:</strong></td>
    </tr>
    <tr>
        <td class="upper">{{ $reception->TypeTrouble }}</td>
        <td class="upper">
            @if( empty($reception->AccessoryAdd))
                NINGUNO
            @else
                {{ $reception->AccessoryAdd }}
            @endif
        </td>
    </tr>
</table>
<table class="font dimtable margintxt">
    <tr>
        <td><strong>MOTIVO:</strong> </td>
        <td><strong>ESTADO DEL EQUIPO</strong></td>
        @if((($reception->StatusEquipment) === 'GenerateDictum') & (! empty($reception->NumberDictum)))
            <td class="upper">
                <strong>Número de dictamen</strong>
            </td>
        @endif
    </tr>
    <tr>
        <td class="upper"><ins>{{ $reception->ReasonReception }}</ins></td>
        <td class="upper">
            @if( ($reception->StatusEquipment) === 'Ready')
                LISTO
            @elseif(($reception->StatusEquipment) === 'GenerateDictum')
                SE GENERO DICTAMEN
            @else
                AUN SIN DEFINIR
            @endif
        </td>

        @if((($reception->StatusEquipment) === 'GenerateDictum') & (! empty($reception->NumberDictum)))
            <td class="upper">
                <ins>{{ $reception->NumberDictum }}</ins>
            </td>
        @endif

    </tr>
</table>
<table class="font dimtable margintxt">
    <tr>
        <td><strong>TÉCNICO ASIGNADO</strong></td>
        <td><strong>OBSERVACIONES</strong></td>
    </tr>
    <tr>
        <td><ins class="upper">{{ $reception->user->name }}</ins></td>
        <td><ins class="upper">{{ $reception->ObservationReception }}</ins></td>
    </tr>
    <tr>
        <td><strong>CONTACTO</strong></td>
    </tr>
    <tr>
        <td><ins class="upper">{{ $reception->user->contact }}</ins></td>
    </tr>
</table>
<table class="font dimtable">
    <tr>
        <td><p class="textp"><strong>RECEPCIONA</strong></p></td>
        <td><p class="textp"><strong>SOLICITA</strong></p></td>
        <td><p class="textp"><strong>RECIBE</strong></p></td>
    </tr>

    <tr>
        <td>
            <p class="textp upper">
                ___________________
                <br>
                FIRMA
                <br>
                </br>{{ $reception->Receptionist }}</p>
        </td>
        <td>
            <p class="textp upper">
                ___________________
                <br>
                FIRMA
                <br>
                </br>{{ $reception->Petitioner }}</p>
        </td>
        <td>
            <p class="textp upper">
                ___________________
                <br>
                FIRMA
                <br>
                </br>{{ $reception->Receive }}</p>
        </td>
    </tr>

</table>

    @endif


@endsection
