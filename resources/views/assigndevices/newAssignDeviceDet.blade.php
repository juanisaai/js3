@extends('layouts.app')

@section('title')
    Depto. Sis. Nueva asignación
@endsection

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Dispositivos disponibles</h1>
                    </div>
                    <div>
                        @include('partials/errors')
                        @include('partials/succeed')
                    </div>

                    <div class="panel-body table-responsive">

                        <table class="table table-hover table-striped">
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
                                        <a href="{{ route('storeAssignDev', ['idDev' => $device->id, 'idEmp' => $employee->id]) }}"><button type="button" class="btn btn-primary btn-sm">Asignar</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $devices->render () }}
                    </div>
    @endif
                </div>
                <div class="form-group pull-left">
                    <a class="btn btn-danger btn-close" href="{{ route('seeEmployeesDev') }}">Cancelar</a>
                </div>
            </div>
        </div>
@endsection



