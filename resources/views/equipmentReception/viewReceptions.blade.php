@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        <div class="container">
            <div class="jumbotron">
                <h1>Oops!</h1>
                <p>Please log in</p>
                <p><a class="btn btn-primary btn-lg" href="{{ url('/login') }}" role="button">Log in</a></p>
            </div>
        </div>

    @else

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Recepción de equipos
                            <a href="{{ route('createRec') }}">Crear
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
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
                                    <th>Detalles</th>
                                    <th>Acciones</th>
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
                                            <a href="{{ route('seeDetails', ['idRec' => $reception->id, 'idEmp' => $reception->equipment->employee_id]) }}">Ver detalles</a>
                                        </td>

                                        <td>
                                            <a href="{{ route('deleteRec', ['idRec' => $reception->id]) }}">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </a> |
                                            <a href="{{ route('editRec', ['idRec' => $reception->id]) }}">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </a>
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
