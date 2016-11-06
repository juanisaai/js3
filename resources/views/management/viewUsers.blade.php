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
                        <div class="panel-heading">Usuario
                            <a href="{{ route('createUser') }}">Crear
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        </div>
                        <div class="panel-body">

                            @include('partials/errors')
                            @include('partials/succeed')

                            <table class="table table-hover table-striped table-responsive">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Nombre de usuario</th>
                                    <th>email</th>
                                    <th>Contacto</th>
                                    <th>Estado del usuario</th>
                                    <th>Tipo de usuario</th>
                                    <th>Acciones</th>
                                </tr>

                            @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->contact }}</td>
                                        <td>
                                            @if( ($user->active) === 1)
                                                Activo
                                            @elseif(($user->active) === 0)
                                                Desactivado
                                            @endif
                                        </td>
                                        <td>
                                            @if( ($user->type) === 'Technician')
                                                Técnico
                                            @elseif(($user->type) === 'Collaborate')
                                                Colaborador
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('deleteUser', ['id' => $user->id]) }}">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </a> |
                                            <a href="{{ route('editUser', ['id' => $user->id]) }}">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
    @endif
                    </div>

                </div>
            </div>
        </div>
@endsection
