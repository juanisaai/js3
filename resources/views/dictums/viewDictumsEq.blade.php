@extends('layouts.app')

@section('title')
    Dictamen de equipos | Sistema de inventario
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
                          <h1 class="panel-title">Lista de dictamen equipos</h1>
                      </div>
                            <div class="panel-body table-responsive">
                                <div>
                                   @include('partials/errors')
                                   @include('partials/succeed')
                                </div>
                                <a href="{{ route('createDictumEq') }}"><button type="button" class="btn btn-success btn-sm pull-right margintab">Nuevo dictamen de equipo</button></a>

                                <table class="table table-hover table-striped">
                                    <tr>
                                        <th>Folio</th>
                                        <th>Fecha de creación</th>
                                        <th>Problemática</th>
                                        <th>Equipo</th>
                                        <th colspan="3" class="text-center">Acciones</th>
                                    </tr>
                                    @foreach($dictumEqs as $dictumEq)
                                        <tr>
                                            <td>{{ $dictumEq->id }}</td>
                                            <td>{{ $dictumEq->created_at->toFormattedDateString() }}</td>
                                            <td>{{ $dictumEq->Problematic }}</td>
                                            <td>@include('dictums.partials.eqViewName')</td>
                                            <td>
                                                <a href="{{ route('editEq', ['idDictum' => $dictumEq->id]) }}"><button type="button" class="btn btn-warning btn-sm">Editar</button></a>
                                            </td>
                                            <td>
                                                <a href="{{ route('deleteEq', ['idDictum' => $dictumEq->id]) }}"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></a>
                                            </td>
                                            <td>
                                                <div class="btn-group dropup pull-right">
                                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle margintab" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Ver <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="{{ route('detailDictumEq', ['idDictumEq' => $dictumEq->id, 'idEq' => $dictumEq->equipment->id, 'idUser' => $dictumEq->user->id, 'area' => $dictumEq->equipment->employee_id]) }}">Detalles</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a href="{{ route('printDictumEq', ['idDictumEq' => $dictumEq->id, 'idEq' => $dictumEq->equipment->id, 'idUser' => $dictumEq->user->id, 'area' => $dictumEq->equipment->employee_id, 'ver' => 1]) }}" target="_blank">Dictamen</a></li>
                                                        <li><a href="{{ route('printDictumEq', ['idDictumEq' => $dictumEq->id, 'idEq' => $dictumEq->equipment->id, 'idUser' => $dictumEq->user->id, 'area' => $dictumEq->equipment->employee_id,'ver' => 2]) }}">Descargar dictamen</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                {!! $dictumEqs->render( ) !!}
                            </div>
                        @endif
                    </div>
            </div>
        </div>
    </div>
@endsection
