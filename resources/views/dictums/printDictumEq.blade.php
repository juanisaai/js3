@extends('layouts.print')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="footer2 font4">
            CCP MINUTARIO
        </div>

            {{ Html::image('images/logosalud.png', "Imagen no encontrada", array('id' => 'logoqroo', 'title' => 'Logo Quintana Roo', 'class' => 'qroolog')) }}
            {{ Html::image('images/logoqroo.png', "Imagen no encontrada", array('id' => 'logosalud', 'title' => 'Logo Salud', 'class' => 'safelog')) }}

        <table class="font2 dimtable" style="position:relative;left:45%;width:55%;">
            <tr>
                <td class="bordertable p3"><p class="p10">DEPENDENCIA: <strong>SERVICIOS ESTATALES DE SALUD</strong></p></td>
            </tr>
            <tr>
                <td class="bordertable p3"><p class="p10">DIRECCION: <strong>JURISDICCION SANITARIA No. 3</strong></p></td>
            </tr>
            <tr>
                <td class="bordertable p3"><p class="p10">ÁREA: <strong>DEPARTAMENTO DE INFORMÁTICA Y SISTEMAS</strong></p></td>
            </tr>
            <tr>
                <td class="bordertable p3">
                    <p class="p10">CD. FELIPE CARRILLO PTO, QUINTANA ROO<br>
                    <strong class="upper2">Fecha: {{ $dictum->created_at->toFormattedDateStringDictum() }}</strong> <strong class="p80">Folio: {{ $dictum->id }}</strong></p>
                </td>
            </tr>
        </table>

        <table class="font2 dimtable margintab" style="position:relative;left:71%;width:55%;">
            <tr>
                <td class="bordertable3"><strong><p>ASUNTO: DICTAMEN TÉCNICO</p></strong></td>
            </tr>
        </table>

        <table class="font2 dimtable margintab bordertable2" style="position:relative;left:1%;width:93%;">
            <tr>
                <td class="bordertable2" style="position:relative;width:20%;"><strong><p class="upper3 p10">EQUIPO</p></strong></td>
                <td class="bordertable2"><strong><p class="upper3 p10">{{ $equipment->dictum_equipment }} - {{ $area->area->NameArea }}</p></strong></td>
            </tr>
            <tr>
                <td class="bordertable2" style="position:relative;width:20%;"><strong><p class="upper3 p10">INVENTARIO Y/O SERIE</p></strong></td>
                <td class="bordertable2">
                    <strong>
                        <p class="upper3 p10">

                            @if(($equipment->InventoryNumberEquipment) === null)
                                INV: S/N
                            @else
                                INV: {{ $equipment->InventoryNumberEquipment }}
                            @endif
                                    -
                                @if(($equipment->SerialNumberEquipment) === null)
                                    SERIE: S/N
                                @else
                                    SERIE: {{ $equipment->SerialNumberEquipment }}
                                @endif
                        </p>
                    </strong>
                </td>
            </tr>
            <tr>
                <td class="bordertable2" style="position:relative;width:20%;"><strong><p class="upper3 p10">PROBLEMÁTICA</p></strong></td>
                <td class="bordertable2"><strong><p class="upper3 p10">{{ $dictum->Problematic }}</p></strong></td>
            </tr>
        </table>

        <table class="font2 dimtable margintab bordertable2" style="position:relative;left:1%;width:93%;">
            <tr>
                <td class="bordertable2" style="position:relative;width:20%;"><strong><p class="upper3 p10">DICTAMEN</p></strong></td>
                <td class="bordertable2"><strong><p class="upper3 p10">{{ $dictum->Dictum }}</p></strong></td>
            </tr>
            <tr>
                <td class="bordertable2" style="position:relative;width:20%;"><strong><p class="upper3 p10">RECOMENDACIÓN</p></strong></td>
                <td class="bordertable2"><strong><p class="upper3 p10">{{ $dictum->Recommendation }}</p></strong></td>
            </tr>
            <tr>
                <td class="bordertable2" style="position:relative;width:20%;"><strong><p class="upper3 p10">OBSERVACIONES </p></strong></td>
                <td class="bordertable2"><strong><p class="upper3 p10">{{ $dictum->observations }}</p></strong></td>
            </tr>
        </table>

        <table class="font2 dimtable3 margintxt">
            <tr>
                <td>
                    <p class="textp upper2 sign2">
                        ATENTAMENTE
                        <br>
                    </p>
                    <p class="textp upper2 sign">
                        ____________________________________________
                        <br>
                        DEPARTAMENTO DE INFORMÁTICA Y SISTEMAS
                        <br>
                        </br>{{ $user->name }}</p>
                </td>
            </tr>
        </table>
    @endif

@endsection
