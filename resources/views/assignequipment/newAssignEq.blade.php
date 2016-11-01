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
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Dispositivos disponibles</div>

                    <div class="panel-body">

                        @include('partials/errors')
                        @include('partials/succeed')

                        <table class="table">
                            <tr>
                                <th>Nomenclatura</th>
                                <th>Dispositivo</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Asignar</th>
                            </tr>

                            @foreach($equipments as $equipment)
                                <tr>
                                    <td>{{ $equipment->NomenclatureEquipment }}</td>
                                    <td>{{ $equipment->DescriptionEquipment }}</td>
                                    <td>{{ $equipment->BrandEquipment }}</td>
                                    <td>{{ $equipment->ModelEquipment }}</td>
                                    <td>
                                        <a href="{{ route('createAssignEq', ['idEq' => $equipment->id]) }}">Asignar <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
    @endif
                </div>
            </div>
        </div>
@endsection



