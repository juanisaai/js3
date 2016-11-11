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
                        <div class="panel-body table-hover table-striped table-responsive">

                            @include('partials/errors')
                            @include('partials/succeed')

                            <table class="table">
                                <tr>
                                    <th>Folio</th>
                                    <th>Fecha</th>
                                    <th>Tipo de problema</th>
                                    <th>Razón de recepción</th>
                                    <th>Empleado propietario</th>
                                    <th>Técnico asignado</th>
                                    <th>Acciones</th>
                                    <th>
                                        <a href="{{ route('createRec') }}"><button type="button" class="btn btn-success pull-right">Crear</button></a>
                                    </th>
                                </tr>

                                @foreach($receptions as $reception)
                                    <tr>
                                        <td>{{ $reception->id }}</td>
                                        <td>{{ date('d F Y', strtotime($reception->created_at)) }}</td>
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
                                            <a href="{{ route('seeDetails', ['idRec' => $reception->id, 'idEmp' => $reception->equipment->employee_id]) }}"><button type="button" class="btn btn-info btn-sm">Detalle</button></a>
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
