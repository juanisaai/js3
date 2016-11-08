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
                        <div class="panel-heading">Data equipment
                            <a href="#">Create
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        </div>
                        <div class="panel-body table-responsive table-hover table-striped">

                            @include('partials/errors')
                            @include('partials/succeed')

                            <table class="table">
                                <tr>
                                    <th>Folio</th>
                                    <th>Fecha de baja</th>
                                    <th>Causa de baja</th>
                                    <th>Dictamen técnico</th>
                                    <th>Fotografía</th>
                                    <th>Alta de activo</th>

                                    <th>Inventory number</th>
                                    <th>Nomenclature</th>
                                    <th>Description</th>

                                    <th>Actions</th>

                            @foreach($lowEquipments as $lowEquipment)
                                    <tr>
                                        <td>{{ $lowEquipment->id }}</td>
                                        <td>{{ date('d F Y', strtotime($lowEquipment->created_at)) }}</td>
                                        <td>{{ $lowEquipment->CauseLow }}</td>
                                        <td>
                                            @if(($lowEquipment->TechnicianDictum) === 1)
                                                Sí
                                            @else
                                                No
                                            @endif
                                        </td>

                                        <td>
                                            @if(($lowEquipment->Picture) === 1)
                                                Sí
                                            @else
                                                No
                                            @endif
                                        </td>

                                        <td>
                                            @if(($lowEquipment->UpInventory) === 1)
                                                Sí
                                            @else
                                                No
                                            @endif
                                        </td>

                                        <td>{{ $lowEquipment->equipment->InventoryNumberEquipment }}</td>
                                        <td>{{ $lowEquipment->equipment->NomenclatureEquipment }}</td>
                                        <td>{{ $lowEquipment->equipment->DescriptionEquipment }}</td>

                                        <td>
                                            <a href="#">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </a> |
                                            <a href="#">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </a>
                                            <a href="#">
                                                Details
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {!! $lowEquipments->render( ) !!}
                        </div>
    @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
