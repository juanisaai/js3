@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Solicitudes de servicios
                            <a href="{{ route('createSerquest') }}">Crear
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        </div>
                        <div class="panel-body table-hover table-striped table-responsive">

                            @include('partials/errors')
                            @include('partials/succeed')

                            <table class="table">
                                <tr>
                                    <th>Folio</th>
                                    <th>Fecha y hora</th>
                                    <th>Razón de servicio</th>
                                    <th>Recepciona</th>
                                    <th>Técnico asignado</th>
                                    <th>Solicitante</th>
                                    <th>Acciones</th>
                                </tr>
                                @foreach($serquests as $serquest)
                                    <tr>
                                        <td>{{ $serquest->id }}</td>
                                        <td>{{ $serquest->created_at }}</td>
                                        <td>{{ $serquest->ReasonRequests }}</td>
                                        <td>{{ $serquest->receptionist }}</td>
                                        <td>{{ $serquest->TechnicianAssigned }}</td>
                                        <td>{{ $serquest->employee->full_name }}</td>
                                        <td>
                                            <a href="{{ route('deleteSerquest', ['id' => $serquest->id]) }}">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </a> |
                                            <a href="{{ route('editSerquest', ['id' => $serquest->id]) }}">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {!! $serquests->render( ) !!}
                        </div>
    @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
