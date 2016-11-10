@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p class="navbar-text navbar-right"><a href="{{ route('newAssignDetEq', ['idEmp' => $employee->id]) }}" class="navbar-link">Crear <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></p>
                            <h3 class="panel-title">Empleado: {{ $employee->ProfileEmployee }} {{ $employee->FirstName }} {{ $employee->SecondName }}</h3>
                            <h4 class="panel-title">Departamento: {{$employee->Area->NameArea}}</h4>
                        </div>
                        <div class="panel-body table-hover table-striped table-responsive">

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
                                    <th>Color</th>
                                    <th>Descripción adicional</th>
                                    <td>Acción</td>
                                </tr>
                                @forelse($employee->equipments as $equipment)
                                    <tr>
                                        <td>{{ $equipment->InventoryNumberEquipment }}</td>
                                        <td>{{ $equipment->NomenclatureEquipment }}</td>
                                        <td>{{ $equipment->DescriptionEquipment }}</td>
                                        <td>{{ $equipment->BrandEquipment }}</td>
                                        <td>{{ $equipment->ModelEquipment }}</td>
                                        <td>{{ $equipment->SerialNumberEquipment }}</td>
                                        <td>{{ $equipment->ColorEquipment }}</td>
                                        <td>{{ $equipment->DescriptionAdEquipment }}</td>
                                        <td>

                                            <a href="{{ route('deleteAssignEq', ['idEq' => $equipment->id]) }}">
                                                Eliminar asignación
                                            </a>

                                        </td>
                                    </tr>
                                @empty
                                    <div class="jumbotron">
                                        <p>There is no data</p>
                                    </div>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection



