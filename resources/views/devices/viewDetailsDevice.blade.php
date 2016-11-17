@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Detalle del dispositivo: <strong>{{ $device->InventoryNumberDevice }}</strong></h1>
                        </div>
                        <div class="panel-body table-hover table-striped table-responsive">

                            @include('partials/errors')
                            @include('partials/succeed')

                            <table class="table">
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
                                    <th>Activo</th>
                                    <th>
                                        <a href="{{ route('editDevice', ['id' => $device->id]) }}"><button type="button" class="btn btn-warning btn-sm">Editar</button></a>
                                    </th>
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
                                        <td>
                                            @if( ($device->active) === 1)
                                                Activo
                                            @elseif(($device->active) === 0)
                                                Desactivado
                                            @endif
                                        </td>
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
