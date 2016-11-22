@extends('layouts.app')

@section('title')
    Equipos | Sistema de inventario
@endsection

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Lista de equipos</h1>
                        </div>
                        <div class="panel-body table-responsive">
                            <div>
                                @include('partials/errors')
                                @include('partials/succeed')
                            </div>
                            <div>
                                <a href="{{ route('createEquipment') }}"><button type="button" class="btn btn-success pull-left margintab">Crear</button></a>
                            </div>

                            <div class="btn-group pull-right margintab">
                                <button type="button" class="btn btn-info dropdown-toggle margintab" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Inventario de Equipos <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('printAllEq', ['ver' => 1]) }}" target="_blank">Ver</a></li>
                                    <li><a href="{{ route('printAllEq', ['ver' => 2]) }}">Descargar</a></li>
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
                                    <th colspan="3" class="text-center">Acciones</th>
                                </tr>

                            @foreach($equipments as $equipment)
                                    <tr>
                                        <td>{{ $equipment->InventoryNumberEquipment }}</td>
                                        <td>{{ $equipment->NomenclatureEquipment }}</td>
                                        <td>{{ $equipment->DescriptionEquipment }}</td>
                                        <td>{{ $equipment->BrandEquipment }}</td>
                                        <td>{{ $equipment->ModelEquipment }}</td>
                                        <td>{{ $equipment->SerialNumberEquipment }}</td>
                                        <td>
                                            <a href="{{ route('editEquipment', ['id' => $equipment->id]) }}"><button type="button" class="btn btn-warning btn-sm">Editar</button></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('deleteEquipment', ['id' => $equipment->id]) }}"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('readDetailsEquipment', ['equipment' => $equipment->id]) }}"><button type="button" class="btn btn-info btn-sm">Detalle</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {!! $equipments->render( ) !!}
                        </div>
    @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
