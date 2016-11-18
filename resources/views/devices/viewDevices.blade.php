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
                            <h1 class="panel-title">Lista de dispositivos</h1>
                        </div>
                        <div class="panel-body table-hover table-striped table-responsive">
                            <div>
                                <a href="{{ route('createDevice') }}"><button type="button" class="btn btn-success pull-left margintab">Crear</button></a>
                            </div>

                            <div class="btn-group pull-right margintab">
                                <button type="button" class="btn btn-info dropdown-toggle margintab" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Inventario Impresoras <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('printAllDev', ['ver' => 1]) }}" target="_blank">Ver</a></li>
                                    <li><a href="{{ route('printAllDev', ['ver' => 2]) }}">Descargar</a></li>
                                </ul>
                            </div>

                            <div class="btn-group pull-right margintab">
                                <button type="button" class="btn btn-info dropdown-toggle margintab" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Inventario Disp. de Red <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('printAllDevR', ['ver' => 1]) }}" target="_blank">Ver</a></li>
                                    <li><a href="{{ route('printAllDevR', ['ver' => 2]) }}">Descargar</a></li>
                                </ul>
                            </div>

                            @include('partials/errors')
                            @include('partials/succeed')

                            <table class="table">
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
                                            <a href="{{ route('editDevice', ['id' => $device->id]) }}"><button type="button" class="btn btn-warning btn-sm">Editar</button></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('deleteDevice', ['id' => $device->id]) }}"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('readDetDevice', ['id' => $device->id]) }}"><button type="button" class="btn btn-info btn-sm">Detalle</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {!! $devices->render( ) !!}
                        </div>
    @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
