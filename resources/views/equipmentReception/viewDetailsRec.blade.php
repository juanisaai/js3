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

                    <p class="text-center">HOJA DE RECEPCIÓN DE EQUIPO DE CÓMPUTO<br>
                    COORDINACIÓN DE INFORMÁTICA</p>
                    <table class="table treceptiondate">
                        <tr>
                            <td><strong>Fecha de recepción:</strong>

                                <ins>{{ $reception->created_at->toFormattedDateString() }}</ins>

                            </td>
                            <td><strong>Hora:</strong> {{ date('h:i:s A', strtotime($reception->created_at)) }}</td>
                            <td><strong>Folio:</strong> {{ $reception->id }}</td>
                        </tr>
                    </table>
                    <p><strong>ÁREA QUE SOLICITA</strong></p>
                    <table class="table treception">
                        <tr>
                            <td><strong>UNIDAD:</strong> <ins>{{ $employee->area->UnitArea }}</ins></td>
                            <td><strong>EXT:</strong> <ins>{{ $employee->area->ExtensionArea }}</ins></td>
                        </tr>
                        <tr>
                            <td><strong>DIRECCIÓN:</strong> <ins>{{ $employee->area->DirectorateArea }}</ins></td>
                            <td><strong>NO. OFICIO:</strong> <ins>{{ $reception->NumberDoc }}</ins></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>ÁREA:</strong> <ins>{{ $employee->area->NameArea }}</ins></p>
                            </td>
                            <td></td>
                        </tr>
                    </table>
                    <p><strong>PROPIETARIO DEL EQUIPO</strong></p>
                    <table class="table treception">
                        <tr>
                            <td>{{ $reception->equipment->full_name }}</td>
                        </tr>
                    </table>
                    <p><strong>DATOS DEL EQUIPO</strong></p>
                    <table class="table treception">
                        <tr>
                            <td><strong>EQUIPO:</strong> {{ $reception->equipment->DescriptionEquipment }}</td>
                            <td><strong>NOMENCLATURA:</strong> {{ $reception->equipment->NomenclatureEquipment }}</td>
                        </tr>
                        <tr>
                            <td><strong>TIPO:</strong> {{ $reception->equipment->TypeEquipment }}</td>
                            <td><strong>NO DE SERIE:</strong> {{ $reception->equipment->SerialNumberEquipment }}</td>
                        </tr>
                        <tr>
                            <td><strong>MARCA:</strong> {{ $reception->equipment->BrandEquipment }}</td>
                            <td><strong>NO DE INVENTARIO:</strong> {{ $reception->equipment->InventoryNumberEquipment }}</td>
                        </tr>
                        <tr>
                            <td><strong>MODELO:</strong> {{ $reception->equipment->ModelEquipment }}</td>
                            <td><strong>COLOR:</strong> {{ $reception->equipment->ColorEquipment }}</td>
                        </tr>
                    </table>
                    <table class="table treceptiondate">
                        <tr>
                            <td><strong>Especificación del trabajo:</strong></td>
                            <td><strong>Accesorios adicionales:</strong></td>
                        </tr>
                        <tr>
                            <td>{{ $reception->TypeTrouble }}</td>
                            <td>
                                @if( empty($reception->AccessoryAdd))
                                    Ninguno
                                @else
                                    {{ $reception->AccessoryAdd }}
                                @endif
                            </td>
                        </tr>
                    </table>
                    <table class="table treceptiondate">
                        <tr>
                            <td><strong>Motivo:</strong> </td>
                            <td><strong>Estado del equipo</strong></td>
                            @if((($reception->StatusEquipment) === 'GenerateDictum') & (! empty($reception->NumberDictum)))
                                <td>
                                    <strong>Número de dictamen</strong>
                                </td>
                            @endif
                        </tr>
                        <tr>
                            <td><ins>{{ $reception->ReasonReception }}</ins></td>
                            <td>
                                @if( ($reception->StatusEquipment) === 'Ready')
                                    Listo
                                @elseif(($reception->StatusEquipment) === 'GenerateDictum')
                                    Se generó dictamen
                                @else
                                    Aun sin definir
                                @endif
                            </td>

                            @if((($reception->StatusEquipment) === 'GenerateDictum') & (! empty($reception->NumberDictum)))
                                <td>
                                    <ins>{{ $reception->NumberDictum }}</ins>
                                </td>
                            @endif

                        </tr>
                    </table>
                    <table class="table treceptiondate">
                        <tr>
                            <td><strong>Técnico asignado</strong></td>
                            <td><strong>Observaciones</strong></td>
                        </tr>
                        <tr>
                            <td><ins>{{ $reception->user->name }}</ins></td>
                            <td><ins>{{ $reception->ObservationReception }}</ins></td>
                        </tr>
                        <tr>
                            <td><strong>Contacto</strong></td>
                        </tr>
                        <tr>
                            <td><ins>{{ $reception->user->contact }}</ins></td>
                        </tr>
                    </table>
                    <table class="table treceptiondate">
                        <tr>
                            <td><p class="text-center"><strong>Recepciona</strong></p></td>
                            <td><p class="text-center"><strong>Solicita</strong></p></td>
                            <td><p class="text-center"><strong>Recibe</strong></p></td>
                        </tr>

                        <tr>
                            <td><p class="text-center">________________________________</p></td>
                            <td><p class="text-center">________________________________</p></td>
                            <td><p class="text-center">________________________________</p></td>
                        </tr>

                        <tr>
                            <td>
                                <p class="text-center">Firma</p>
                                <p class="text-center">{{ $reception->Receptionist }}</p>
                            </td>
                            <td>
                                <p class="text-center">Firma</p>
                                <p class="text-center">{{ $reception->Petitioner }}</p>
                            </td>
                            <td>
                                <p class="text-center">Firma</p>
                                <p class="text-center">{{ $reception->Receive }}</p>
                            </td>
                        </tr>
                    </table>
    @endif
                </div>
            </div>
            <div class="form-group pull-left">
                <a class="btn btn-success btn-close" href="{{ route('seeReceptions') }}">Regresar</a>
            </div>
            <div class="form-group pull-right">
                <a href="{{ route('printReception', ['idRec' => $reception->id, 'idEmp' => $reception->equipment->employee_id]) }}"><button type="button" class="btn btn-info btn-sm">Imprimir</button></a>
            </div>
        </div>
@endsection
