@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Equipos disponibles</h1>
                    </div>

                    <div class="panel-body">

                        @include('partials/errors')
                        @include('partials/succeed')

                        <table class="table">
                            <tr>
                                <th>Nomenclatura</th>
                                <th>Dispositivo</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Acción</th>
                            </tr>

                            @foreach($equipments as $equipment)
                                <tr>
                                    <td>{{ $equipment->NomenclatureEquipment }}</td>
                                    <td>{{ $equipment->DescriptionEquipment }}</td>
                                    <td>{{ $equipment->BrandEquipment }}</td>
                                    <td>{{ $equipment->ModelEquipment }}</td>
                                    <td>
                                        <a href="{{ route('createAssignEq', ['idEq' => $equipment->id]) }}"><button type="button" class="btn btn-primary btn-sm">Siguiente</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $equipments->render( ) !!}
                    </div>
    @endif
                </div>
                <div class="form-group pull-left">
                    <a class="btn btn-danger btn-close" href="{{ route('seeEmployeesEq') }}">Cancelar</a>
                </div>
            </div>
        </div>
@endsection



