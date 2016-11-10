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
                            <h1 class="panel-title">Lista de equipos</h1>
                        </div>
                        <div class="panel-body table-responsive table-hover table-striped">

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
                                    <th>Acciones</th>
                                    <th>
                                        <a href="{{ route('createEquipment') }}"><button type="button" class="btn btn-success pull-right">Crear</button></a>
                                    </th>
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
                                            <a href="{{ route('deleteEquipment', ['id' => $equipment->id]) }}"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></a>
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
