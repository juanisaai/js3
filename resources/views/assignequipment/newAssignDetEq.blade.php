@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Dispositivos disponibles</div>

                    <div class="panel-body">

                        @include('partials/errors')
                        @include('partials/succeed')

                        <table class="table">
                            <tr>
                                <th>Nomenclatura</th>
                                <th>Dispositivo</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Asignar</th>
                            </tr>

                            @foreach($equipments as $equipment)
                                <tr>
                                    <td>{{ $equipment->NomenclatureEquipment }}</td>
                                    <td>{{ $equipment->DescriptionEquipment }}</td>
                                    <td>{{ $equipment->BrandEquipment }}</td>
                                    <td>{{ $equipment->ModelEquipment }}</td>
                                    <td>
                                        <a href="{{ route('storeAssignEq', ['idEq' => $equipment->id, 'idEmp' => $employee->id]) }}">Asignar <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
    @endif
                </div>
            </div>
        </div>
@endsection



