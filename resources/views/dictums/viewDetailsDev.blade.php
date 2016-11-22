@extends('layouts.app')

@section('title')
    Dictamen de dispositivos - Detalles | Sistema de inventario
@endsection

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Dictamen <span class="label label-default">{{ $dictum->id }}</span></h2>
                    <h3>Técnico <span class="label label-default">{{ $user->name }}</span></h3>
                    <p class="p11"><strong>Fecha: </strong><span class="label label-default upper2">{{ $dictum->created_at->toFormattedDateStringDictum() }}</span></p>
                    <div class="det-Title">
                        <a href="{{ route('editEq', ['idDictum' => $dictum->id]) }}" class="det-Title"><button type="button" class="btn btn-warning btn-sm">Editar</button></a>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Datos del dispositivo</h1>
                        </div>
                        <div class="panel-body table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>Descripción</th>
                                    <th>Tipo de equipo</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Color</th>
                                    <th>Número de inventario</th>
                                    <th>Número de serie</th>
                                </tr>

                                <tr>
                                    <td>{{ $device->DescriptionDevice }}</td>
                                    <td>{{ $device->TypeDevice }}</td>
                                    <td>{{ $device->BrandDevice }}</td>
                                    <td>{{ $device->ModelDevice }}</td>
                                    <td>{{ $device->ColorDevice }}</td>
                                    <td>{{ $device->InventoryNumberDevice }}</td>
                                    <td>{{ $device->SerialNumberDevice }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Datos del dictamen</h1>
                        </div>
                        <div class="panel-body table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>Problemática</th>
                                    <th>Dictamen</th>
                                    <th>Recomendación</th>
                                    <th>Observación</th>
                                </tr>

                                <tr>
                                    <td>{{ $dictum->Problematic }}</td>
                                    <td>{{ $dictum->Dictum }}</td>
                                    <td>{{ $dictum->Recommendation }}</td>
                                    <td>{{ $dictum->observations }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="form-group pull-left">
                    <a class="btn btn-success btn-close" href="{{ route('readDictums') }}">Regresar</a>
                </div>
            </div>
        </div>
    @endif
@endsection



