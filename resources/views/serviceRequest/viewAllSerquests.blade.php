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
                            <h1 class="panel-title">Lista de solicitudes de servicio</h1>
                        </div>
                        <div class="panel-body table-hover table-striped table-responsive">
                            <div>
                                <a href="{{ route('createSerquest') }}"><button type="button" class="btn btn-success pull-right margintab">Crear</button></a>
                            </div>

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
                                    <th colspan="3" class="text-center">Acciones</th>
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
                                            <a href="{{ route('editSerquest', ['id' => $serquest->id]) }}"><button type="button" class="btn btn-warning btn-sm">Editar</button></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('deleteSerquest', ['id' => $serquest->id]) }}"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('seeDetailsSerq', ['id' => $serquest->id, 'idEmp' => $serquest->employee->id]) }}"><button type="button" class="btn btn-info btn-sm">Detalle</button></a>
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
