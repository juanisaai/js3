@extends('layouts.app')

@section('title')
    Impresora - Detalles | Sistema de inventario
@endsection

@section('content')

    @if (Auth::guest())

        @include('partials.login')

    @else

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>Detalles de Impresora
                        <span class="label label-default">
                            @if(empty($device->InventoryNumberDevice) or (($device->InventoryNumberDevice) === null))
                                S/N
                            @else
                                {{ $device->InventoryNumberDevice }}
                            @endif
                        </span>
                    </h2>

                    @if( ($device->active) === 1)
                        <h4><span class="label label-success">Dispositivo activo</span></h4>
                    @elseif(($device->active) === 0)
                        <h4><span class="label label-danger">Dispositivo desactivado</span></h4>
                    @endif

                    <div class="det-Title">
                        <a href="{{ route('editDevice', ['id' => $device->id]) }}" class="det-Title"><button type="button" class="btn btn-warning btn-sm">Editar</button></a>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Datos generales de impresora</h1>
                        </div>
                        <div class="panel-body table-responsive">

                            @include('partials.errors')
                            @include('partials.succeed')

                            <table class="table table-hover table-striped">
                                <tr>
                                    <th>Número de inventario</th>
                                    <th>Nomenclatura</th>
                                    <th>Descripción</th>
                                    <th>Tipo</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Número de serie</th>
                                    <th>Color</th>
                                    <th>Descripción adicional</th>
                                </tr>
                                    <tr>
                                        <td>{{ $device->InventoryNumberDevice }}</td>
                                        <td>{{ $device->NomenclatureDevice }}</td>
                                        <td>{{ $device->DescriptionDevice }}</td>
                                        <td>{{ $device->TypeDevice }}</td>
                                        <td>{{ $device->BrandDevice }}</td>
                                        <td>{{ $device->ModelDevice }}</td>
                                        <td>{{ $device->SerialNumberDevice }}</td>
                                        <td>{{ $device->ColorDevice }}</td>
                                        <td>{{ $device->DescriptionAdDevice }}</td>
                                    </tr>
                            </table>
                        </div>
    @endif
                    </div>

                    <div class="form-group pull-left">
                        <a class="btn btn-success btn-close" href="{{ route('readDevice') }}">Regresar</a>
                    </div>

                </div>
            </div>
        </div>
@endsection
