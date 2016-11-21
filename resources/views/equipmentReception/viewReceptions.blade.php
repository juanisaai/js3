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
                            <h1 class="panel-title">Lista de recepción de equipos</h1>
                        </div>
                        <div class="panel-body table-responsive">
                            <div>
                                @include('partials/errors')
                                @include('partials/succeed')
                            </div>
                            <div>
                                <a href="{{ route('createRec') }}"><button type="button" class="btn btn-success pull-right margintab">Crear</button></a>
                            </div>

                            <table class="table table-hover table-striped">
                                <tr>
                                    <th>Folio</th>
                                    <th>Fecha</th>
                                    <th>Tipo de problema</th>
                                    <th>Razón de recepción</th>
                                    <th>Empleado propietario</th>
                                    <th>Técnico asignado</th>
                                    <th colspan="3" class="text-center">Acciones</th>
                                </tr>

                                @foreach($receptions as $reception)
                                    <tr>
                                        <td>{{ $reception->id }}</td>
                                        <td>{{ $reception->created_at->toFormattedDateString() }}</td>
                                        <td>{{ $reception->TypeTrouble }}</td>
                                        <td>{{ $reception->ReasonReception }}</td>
                                        <td>{{ $reception->equipment->full_name }}</td>
                                        <td>{{ $reception->user->name }}</td>
                                        <td>
                                            <a href="{{ route('editRec', ['idRec' => $reception->id]) }}"><button type="button" class="btn btn-warning btn-sm">Editar</button></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('deleteRec', ['idRec' => $reception->id]) }}"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></a>
                                        </td>
                                        <td>
                                            <div class="btn-group dropup pull-right">
                                                <button type="button" class="btn btn-info btn-sm dropdown-toggle margintab" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Hoja de recepción <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ route('printReception', ['idRec' => $reception->id, 'idEmp' => $reception->equipment->employee_id, 'ver' => 1]) }}" target="_blank">Ver</a></li>
                                                    <li><a href="{{ route('printReception', ['idRec' => $reception->id, 'idEmp' => $reception->equipment->employee_id, 'ver' => 2]) }}">Descargar</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {!! $receptions->render( ) !!}
                        </div>
    @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
