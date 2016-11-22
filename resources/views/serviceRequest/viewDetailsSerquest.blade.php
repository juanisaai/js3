@extends('layouts.app')

@section('title')
    Hojas de servicio - Detalles | Sistema de inventario
@endsection

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
                    <p class="text-center"><strong>HOJA DE SERVICIO</strong><br>
                    Soporte Técnico</p>
                    <table class="table treceptiondate">
                        <tr>
                            <td><strong>Fecha de recepción:</strong>
                                <ins>{{ $serquest->created_at->toFormattedDateString() }}</ins>
                            </td>
                            <td><strong>Hora:</strong> {{ date('h:i:s A', strtotime($serquest->created_at)) }}</td>
                            <td><strong>Folio:</strong> {{ $serquest->id }}</td>
                        </tr>
                        </table>

                        <table class="table treceptiondate">

                        <tr>
                            <td class="space"><strong>REPORTÓ: </strong></td>
                            <td><ins>{{ $serquest->employee->full_name }}</ins></td>
                        </tr>
                        <tr>
                            <td class="space"><strong>DIRECCIÓN: </strong></td>
                            <td><ins>{{ $employee->area->DirectorateArea }}</ins></td>
                        </tr>
                        <tr>
                            <td class="space"><strong>ÁREA: </strong></td>
                            <td><ins>{{ $employee->area->NameArea }}</ins></td>
                        </tr>
                        <tr>
                            <td class="space"><strong>MOTIVO: </strong></td>
                            <td><ins>{{ $serquest->ReasonRequests }}</ins></td>
                        </tr>

                    </table>

                    <table class="table treceptiondate">
                        <tr>
                            <td class="space2"><strong>RECEPCIONA EL SERVICIO: </strong></td>
                            <td><ins>{{ $serquest->receptionist }}</ins></td>
                        </tr>
                        <tr>
                            <td class="space2"><strong>TÉCNICO ASIGNADO:</strong></td>
                            <td><ins>{{ $serquest->TechnicianAssigned }}</ins></td>
                        </tr>
                    </table>

                    <table class="table treceptiondate">
                        <tr>
                            <td><strong>DESCRIPCIÓN DEL PROBLEMA: </strong></td>
                        </tr>
                        <tr>
                            <td><ins>{{ $serquest->DescriptionService }}</ins></td>
                        </tr>
                        <tr>
                            <td><p class="text-center">________________________________</p></td>
                        </tr>

                        <tr>
                            <td>
                                <p class="text-center">Firma</p>
                                <p class="text-center">{{ $serquest->employee->full_name }}</p>
                            </td>
                        </tr>
                    </table>
    @endif
                </div>
            </div>
            <div class="form-group pull-left">
                <a class="btn btn-success btn-close" href="{{ route('seeAllRequests') }}">Regresar</a>
            </div>
            <div class="form-group pull-right">
                <a href="{{ route('printDetailsSerq', ['id' => $serquest->id, 'idEmp' => $serquest->employee->id]) }}"><button type="button" class="btn btn-info btn-sm">Imprimir</button></a>
            </div>
        </div>
@endsection
