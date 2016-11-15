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
                            <h1 class="panel-title">Baja de inventario Equipos</h1>
                        </div>
                        <div class="panel-body table-responsive table-hover table-striped">

                            @include('partials/errors')
                            @include('partials/succeed')

                            <table class="table">
                                <tr>
                                    <th>Folio</th>
                                    <th>Fecha de baja</th>
                                    <th>Causa de baja</th>
                                    <th>Número de inventario</th>
                                    <th>Nomenclatura</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                    <th>
                                        <a href="#"><button type="button" class="btn btn-success pull-right">Crear</button></a>
                                    </th>
                                </tr>

                            @foreach($lowEquipments as $lowEquipment)
                                    <tr>
                                        <td>{{ $lowEquipment->id }}</td>
                                        <td>{{ $lowEquipment->created_at->toFormattedDateString() }}</td>
                                        <td>{{ $lowEquipment->CauseLow }}</td>
                                        <td>{{ $lowEquipment->equipment->InventoryNumberEquipment }}</td>
                                        <td>{{ $lowEquipment->equipment->NomenclatureEquipment }}</td>
                                        <td>{{ $lowEquipment->equipment->DescriptionEquipment }}</td>
                                        <td>
                                            <a href="#"><button type="button" class="btn btn-warning btn-sm">Editar</button></a>
                                        </td>
                                        <td>
                                            <a href="#"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></a>
                                        </td>
                                        <td>
                                            <a href="#"><button type="button" class="btn btn-info btn-sm">Detalle</button></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </table>
                            {!! $lowEquipments->render( ) !!}
                        </div>
    @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
