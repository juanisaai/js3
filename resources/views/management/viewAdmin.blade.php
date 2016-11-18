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
                            <h1 class="panel-title">Configuración de administrador</h1>
                        </div>
                        <div class="panel-body table-hover table-striped table-responsive">

                            @include('partials/errors')
                            @include('partials/succeed')

                            <table class="table">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Nombre de usuario</th>
                                    <th>email</th>
                                    <th>Contacto</th>
                                    <th>Estado del usuario</th>
                                    <th>Tipo de usuario</th>
                                    <th>Acciones</th>
                                    <th>
                                        <a href="{{ route('createAdmin') }}"><button type="button" class="btn btn-success pull-right">Crear</button></a>
                                    </th>
                                </tr>

                            @foreach($admins as $admin)
                                    <tr>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->username }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->contact }}</td>
                                        <td>
                                            @if( ($admin->active) === 1)
                                                Activo
                                            @elseif(($admin->active) === 0)
                                                Desactivado
                                            @endif
                                        </td>
                                        <td>
                                            @if( ($admin->type) === 'Technician')
                                                Técnico
                                            @elseif(($admin->type) === 'Collaborate')
                                                Colaborador
                                            @else
                                                Administrador
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('editAdmin', ['id' => $admin->id]) }}"><button type="button" class="btn btn-warning btn-sm">Editar</button></a>
                                            <a href="{{ route('deleteAdmin', ['id' => $admin->id]) }}"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {{ $admins->render() }}
                        </div>
    @endif
                    </div>

                </div>
            </div>
        </div>
@endsection