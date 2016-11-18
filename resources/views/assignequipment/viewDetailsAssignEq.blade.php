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
                            <h3 class="panel-title">Empleado: {{ $employee->full_name }}</h3>
                            <h4 class="panel-title">Departamento: {{$employee->Area->NameArea}}</h4>
                        </div>
                        <div class="panel-body table-hover table-striped table-responsive">
                            <div>
                                <a href="{{ route('newAssignDetEq', ['idEmp' => $employee->id]) }}"><button type="button" class="btn btn-success pull-right margintab">Crear</button></a>
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
                                    <th>Color</th>
                                    <th>Descripción adicional</th>
                                    <th colspan="2" class="text-center">Acción</th>
                                </tr>
                                @foreach($employee->equipments as $equipment)
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
                                            <a href="{{ route('deleteAssignEq', ['idEq' => $equipment->id]) }}"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('seeInvEq', ['id' => $equipment->id, 'idEmp' => $employee->id]) }}"><button type="button" class="btn btn-info btn-sm">Reporte</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="form-group pull-left">
                        <a class="btn btn-success btn-close" href="{{ route('seeEmployeesEq') }}">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection



