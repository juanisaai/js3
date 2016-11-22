@extends('layouts.app')

@section('title')
    Dictamen de dispositivos | Sistema de inventario
@endsection

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                      <div class="panel-heading">
                          <h1 class="panel-title">Lista de dictamen dispositivos</h1>
                      </div>
                            <div class="panel-body table-responsive">
                                <div>
                                    @include('partials/errors')
                                    @include('partials/succeed')
                                </div>
                                <a href="{{ route('createDictumDev') }}"><button type="button" class="btn btn-success btn-sm pull-right margintab">Crear</button></a>

                                <table class="table table-hover table-striped">
                                    <tr>
                                        <th>Folio</th>
                                        <th>Fecha de creación</th>
                                        <th>Problemática</th>
                                        <th>Dispositivo</th>
                                        <th colspan="3" class="text-center">Acciones</th>
                                    </tr>
                                    @foreach($dictums as $dictum)
                                        <tr>
                                            <td>{{ $dictum->id }}</td>
                                            <td>{{ $dictum->created_at->toFormattedDateString() }}</td>
                                            <td>{{ $dictum->Problematic }}</td>
                                            <td>@include('dictums.partials.devViewName')</td>
                                            <td>
                                                <a href="{{ route('editDev', ['idDictum' => $dictum->id]) }}"><button type="button" class="btn btn-warning btn-sm">Editar</button></a>
                                            </td>
                                            <td>
                                                <a href="{{ route('deleteDev', ['idDictum' => $dictum->id]) }}"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></a>
                                            </td>
                                            <td>
                                                <div class="btn-group dropup pull-right">
                                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle margintab" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Ver <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="{{ route('detailDictumDev', ['idDictum' => $dictum->id, 'idDev' => $dictum->device->id, 'idUser' => $dictum->user->id, 'area' => $dictum->device->employee_id]) }}">Detalles</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a href="{{ route('printDictumDev', ['idDictum' => $dictum->id, 'idDev' => $dictum->device->id, 'idUser' => $dictum->user->id, 'area' => $dictum->device->employee_id, 'ver' => 1]) }}" target="_blank">Dictamen</a></li>
                                                        <li><a href="{{ route('printDictumDev', ['idDictum' => $dictum->id, 'idDev' => $dictum->device->id, 'idUser' => $dictum->user->id, 'area' => $dictum->device->employee_id,'ver' => 2]) }}">Descargar dictamen</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                {!! $dictums->render( ) !!}
                            </div>
                        @endif
                    </div>
            </div>
        </div>
    </div>
@endsection
