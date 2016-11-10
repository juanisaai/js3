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

                            @foreach($devices as $device)
                                <tr>
                                    <td>{{ $device->NomenclatureDevice }}</td>
                                    <td>{{ $device->DescriptionDevice }}</td>
                                    <td>{{ $device->BrandDevice }}</td>
                                    <td>{{ $device->ModelDevice }}</td>
                                    <td>
                                        <a href="{{ route('storeAssignDev', ['idDev' => $device->id, 'idEmp' => $employee->id]) }}">Asignar <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
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



