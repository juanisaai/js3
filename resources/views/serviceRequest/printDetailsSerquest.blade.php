@extends('layouts.print')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

            {{ Html::image('images/logosalud.png', "Imagen no encontrada", array('id' => 'logoqroo', 'title' => 'Logo Quintana Roo', 'class' => 'qroolog')) }}
            {{ Html::image('images/logoqroo.png', "Imagen no encontrada", array('id' => 'logosalud', 'title' => 'Logo Salud', 'class' => 'safelog')) }}

<table class="font dimtable margintab">
    <tr>
        <td>
            <p class="titulo"><strong>HOJA DE SERVICIO</strong><br>
                Soporte Técnico</p>
        </td>
    </tr>
</table>

<table class="font dimtable margintab">
    <tr>
        <td><strong>Fecha de recepción:</strong>
            <ins class="upper">{{ $serquest->created_at->toFormattedDateString() }}</ins>
        </td>
        <td><strong>Hora:</strong> {{ date('h:i:s A', strtotime($serquest->created_at)) }}</td>
        <td><strong>Folio:</strong> {{ $serquest->id }}</td>
    </tr>
</table>

<table class="font dimtable margintab">

    <tr>
        <td class="space"><strong>REPORTÓ: </strong></td>
        <td><ins class="upper">   {{ $serquest->employee->full_name }}</ins></td>
    </tr>
    <tr>
        <td class="space"><strong>DIRECCIÓN: </strong></td>
        <td><ins class="upper"> {{ $employee->area->DirectorateArea }}</ins></td>
    </tr>
    <tr>
        <td class="space"><strong>ÁREA: </strong></td>
        <td><ins class="upper"> {{ $employee->area->NameArea }}</ins></td>
    </tr>
    <tr>
        <td class="space"><strong>MOTIVO: </strong></td>
        <td><ins class="upper">{{ $serquest->ReasonRequests }}</ins></td>
    </tr>

</table>

<table class="font dimtable margintab2">
    <tr>
        <td class="space2"><strong>RECEPCIONA EL SERVICIO: </strong></td>
        <td><ins class="upper">{{ $serquest->receptionist }}</ins></td>
    </tr>
    <tr>
        <td class="space2"><strong>TÉCNICO ASIGNADO:</strong></td>
        <td><ins class="upper">   {{ $serquest->TechnicianAssigned }}</ins></td>
    </tr>
</table>

<table class="font dimtable margintab2">
    <tr>
        <td><strong>DESCRIPCIÓN DEL SERVICIO: </strong></td>
    </tr>
    <tr>
        <td class="upper"><ins>{{ $serquest->DescriptionService }}</ins></td>
    </tr>
    <tr>
        <td>
            <p class="textp upper sign">
                ____________________________________
                <br>
                FIRMA
                <br>
                </br>{{ $serquest->employee->full_name }}</p>
        </td>
    </tr>
</table>

    @endif


@endsection
