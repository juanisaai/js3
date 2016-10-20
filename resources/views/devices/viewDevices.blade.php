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
                        <div class="panel-heading">Devices
                            <a href="{{ route('createDevice') }}">Create
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </a>
                        </div>
                        <div class="panel-body table-hover table-striped table-responsive">

                            @include('partials/errors')
                            @include('partials/succeed')

                            <table class="table">
                                <tr>
                                    <th>Inventory Number</th>
                                    <th>Nomenclature</th>
                                    <th>Description</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Serial Number</th>
                                    <th>Color</th>
                                    <th>Description add</th>
                                    <th>Actions</th>
                                </tr>

                            @foreach($devices as $device)
                                    <tr>
                                        <td>{{ $device->InventoryNumberDevice }}</td>
                                        <td>{{ $device->NomenclatureDevice }}</td>
                                        <td>{{ $device->DescriptionDevice }}</td>
                                        <td>{{ $device->BrandDevice }}</td>
                                        <td>{{ $device->ModelDevice }}</td>
                                        <td>{{ $device->SerialNumberDevice }}</td>
                                        <td>{{ $device->ColorDevice }}</td>
                                        <td>{{ $device->DescriptionAdDevice }}</td>
                                        <td>
                                            <a href="{{ route('deleteDevice', ['id' => $device->id]) }}">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </a> |
                                            <a href="{{ route('editDevice', ['id' => $device->id]) }}">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </a>
                                            <a href="#">Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {!! $devices->render( ) !!}
                        </div>
    @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
