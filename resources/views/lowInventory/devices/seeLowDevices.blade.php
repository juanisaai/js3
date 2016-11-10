@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Dispositivos
                            <a href="{{ route('createDevice') }}">Crear
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </a>
                        </div>
                        <div class="panel-body table-hover table-striped table-responsive">

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

                                @foreach($lowDevices as $lowDevice)
                                    <tr>
                                        <td>{{ $lowDevice->id }}</td>
                                        <td>{{ date('d F Y', strtotime($lowDevice->created_at)) }}</td>
                                        <td>{{ $lowDevice->CauseLow }}</td>
                                        <td>
                                            @if(($lowDevice->TechnicianDictum) === 1)
                                                Sí
                                            @else
                                                No
                                            @endif
                                        </td>

                                        <td>
                                            @if(($lowDevice->Picture) === 1)
                                                Sí
                                            @else
                                                No
                                            @endif
                                        </td>

                                        <td>
                                            @if(($lowDevice->UpInventory) === 1)
                                                Sí
                                            @else
                                                No
                                            @endif
                                        </td>

                                        <td>{{ $lowDevice->device->InventoryNumberDevice }}</td>
                                        <td>{{ $lowDevice->device->NomenclatureDevice }}</td>
                                        <td>{{ $lowDevice->device->DescriptionDevice }}</td>

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
                            {!! $lowDevices->render( ) !!}
                        </div>
    @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
