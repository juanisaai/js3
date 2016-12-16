@extends('layouts.app')

@section('title')
    Administrador | Sistema de inventario
@endsection

@section('content')

    @if (Auth::guest())

        @include('partials.login')

    @else

        @can('Admin')

            <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Configuración de administrador</h1>
                        </div>
                        <div class="panel-body table-responsive">
                            <div>
                                @include('partials.errors')
                                @include('partials.succeed')
                            </div>
                            <div>
                                <a href="{{ route('createAdmin') }}"><button type="button" class="btn btn-success pull-right margintab">Crear</button></a>
                            </div>

                            <table class="table table-hover table-striped ">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Nombre de usuario</th>
                                    <th>email</th>
                                    <th>Contacto</th>
                                    <th>Estado del usuario</th>
                                    <th>Tipo de usuario</th>
                                    <th colspan="2" class="text-center">Acciones</th>
                                </tr>

                            @foreach($admins as $admin)
                                    <tr>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->username }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->contact }}</td>
                                        <td>{{ trans('user.active.' . $admin->active) }}</td>
                                        <td>{{ trans('user.type.' . $admin->type) }}</td>
                                        <td>
                                            <a href="{{ route('editAdmin', ['id' => $admin->id]) }}"><button type="button" class="btn btn-warning btn-sm">Editar</button></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('deleteAdmin', ['id' => $admin->id]) }}"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {{ $admins->render() }}
                        </div>
                    </div>
                </div>
            </div>
            </div>

                    @endif


    @endcan
@endsection
