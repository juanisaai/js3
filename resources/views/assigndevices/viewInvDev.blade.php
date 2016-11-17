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

                    <p class="text-center">
                        <strong>SERVICIOS ESTATALES DE SALUD
                            <br>
                        JURISDICCION SANITARIA No. III</strong>
                            <br>
                        <strong>DEPARTAMENTO DE INFORMÁTICA Y SISTEMAS
                            <br>
                            Reporte de Inventarios de Equipos y Accesorios
                        </strong></p>

                    <table class="table treceptiondate">

                        <tr>
                            <td class="space"><strong>Usuario: </strong></td>
                            <td><ins>{{ $employee->full_name }}</ins></td>
                            <td class="space3"><strong>Nombre Dispostivo: </strong></td>
                            <td><ins>{{ $device->NomenclatureDevice }}</ins></td>
                        </tr>
                        <tr>
                            <td class="space"><strong>Dirección: </strong></td>
                            <td><strong><ins>{{ $employee->area->DirectorateArea }}</ins></strong></td>
                            <td class="space"><strong>Área: </strong></td>
                            <td><ins>{{ $employee->area->NameArea }}</ins></td>
                        </tr>

                    </table>

                    <table class="table treception">
                        <tr>
                            <th class="color">Dispositivo</th>
                            <th class="color">Tipo</th>
                            <th class="color">Marca</th>
                            <th class="color">Modelo</th>
                            <th class="color">No. de inventario/No. de serie</th>
                        </tr>
                        <tr>
                            <td>{{ $device->DescriptionDevice }}</td>
                            <td>{{ $device->TypeDevice }}</td>
                            <td>{{ $device->BrandDevice }}</td>
                            <td>{{ $device->ModelDevice }}</td>
                            @if(($device->InventoryNumberDevice) === null)
                                <td>{{ $device->SerialNumberDevice }}</td>
                            @else
                                <td>{{ $device->InventoryNumberDevice }}</td>
                            @endif
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td><p class="text-center">________________________________</p></td>
                        </tr>

                        <tr>
                            <td>
                                <p class="text-center">Firma</p>
                                <p class="text-center">{{ $employee->full_name }}</p>
                            </td>
                        </tr>
                    </table>

                    @endif
                </div>
            </div>
            <div class="form-group pull-left">
                <a class="btn btn-success btn-close" href="{{ route('seeDetailsAssignDev', ['id' => $employee->id]) }}">Regresar</a>
            </div>
            <div class="form-group pull-right">
                <a href="{{ route('printInvDev', ['id' => $device->id, 'idEmp' => $employee->id]) }}"><button type="button" class="btn btn-info btn-sm">Imprimir</button></a>
            </div>
        </div>
@endsection
