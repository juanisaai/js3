@extends('layouts.app')

@section('title')
    Dispositivos de Red | Sistema de inventario
@endsection

@section('content')

    @if (Auth::guest())

        @include('partials.login')

    @else

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Lista de equipos de comunicación e Internet</h1>
                        </div>
                        <div class="panel-body table-responsive">
                            <div>
                                @include('partials.errors')
                                @include('partials.succeed')
                            </div>
                            <div>
                                <a href="{{ route('createDeviceN') }}"><button type="button" class="btn btn-success pull-left margintab">Crear</button></a>
                            </div>

                            <div class="btn-group pull-right margintab">
                                <button type="button" class="btn btn-info dropdown-toggle margintab" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Inventario Disp. de Red <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('printAllDevN', ['ver' => 1]) }}" target="_blank">Ver</a></li>
                                    <li><a href="{{ route('printAllDevN', ['ver' => 2]) }}">Descargar</a></li>
                                </ul>
                            </div>

                            <table class="table table-hover table-striped">
                                <tr>
                                    <th>Número de inventario</th>
                                    <th>Nomenclatura</th>
                                    <th>Descripción</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Número de serie</th>
                                    <th class="text-center" colspan="3">Acciones</th>
                                </tr>

                            @foreach($devices as $device)
                                    <tr>
                                        <td>{{ $device->InventoryNumberDevice }}</td>
                                        <td>{{ $device->NomenclatureDevice }}</td>
                                        <td>{{ $device->DescriptionDevice }}</td>
                                        <td>{{ $device->BrandDevice }}</td>
                                        <td>{{ $device->ModelDevice }}</td>
                                        <td>{{ $device->SerialNumberDevice }}</td>
                                        <td>
                                            <a href="{{ route('editDeviceN', ['id' => $device->id]) }}"><button type="button" class="btn btn-warning btn-sm">Editar</button></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('deleteDeviceN', ['id' => $device->id]) }}"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('readDetDeviceN', ['id' => $device->id]) }}"><button type="button" class="btn btn-info btn-sm">Detalle</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {!! $devices->render( ) !!}
                        </div>
                    </div>

                    @endif
                </div>
            </div>
        </div>
@endsection
