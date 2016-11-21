@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Empleado <span class="label label-default">{{ $employee->full_name }}</span></h2>
                    <h3>Departamento <span class="label label-default">{{$employee->Area->NameArea}}</span></h3>

                    <div class="panel panel-default">
                        <div class="panel-body table-responsive">
                            <div>
                                @include('partials/errors')
                                @include('partials/succeed')
                            </div>
                            <div>
                                <a href="{{ route('newAssignDetEq', ['idEmp' => $employee->id]) }}"><button type="button" class="btn btn-success pull-right margintab">Crear</button></a>
                            </div>
                            <table class="table table-hover table-striped">
                                <tr>
                                    <th>Número de inventario</th>
                                    <th>Nomenclatura</th>
                                    <th>Descripción</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Número de serie</th>
                                    <th>Color</th>
                                    <th>Descripción adicional</th>
                                    <th colspan="2" class="text-center">Acciones</th>
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
                                            <div class="btn-group dropup pull-right margintab">
                                                <button type="button" class="btn btn-info btn-sm dropdown-toggle margintab" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Reporte de Inventario <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('printInvEq', ['id' => $equipment->id, 'idEmp' => $employee->id, 'ver' => 1]) }}" target="_blank">Ver</a></li>
                                                    <li><a href="{{ route('printInvEq', ['id' => $equipment->id, 'idEmp' => $employee->id, 'ver' => 2]) }}">Descargar</a></li>
                                                </ul>
                                            </div>
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



