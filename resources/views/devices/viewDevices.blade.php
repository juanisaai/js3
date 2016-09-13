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
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        </div>
                        <div class="panel-body">

                            @include('partials/errors')
                            @include('partials/succeed')

                            <table class="table table-hover table-striped table-responsive">
                                <tr>
                                    <th>Type Device</th>
                                    <th>Model Device</th>
                                    <th>Brand Device</th>
                                    <th>Serial Number Device</th>
                                    <th>Inventory Number Device</th>
                                    <th>Supplier</th>
                                    <th>Actions</th>
                                </tr>

                            @foreach($devices as $device)
                                    <tr>
                                        <td>{{ $device->TypeDevice }}</td>
                                        <td>{{ $device->ModelDevice }}</td>
                                        <td>{{ $device->BrandDevice }}</td>
                                        <td>{{ $device->SerialNumberDevice }}</td>
                                        <td>{{ $device->InventoryNumberDevice }}</td>
                                        <td>{{ $device->supplier->NameSupplier }}</td>
                                        <td>
                                            <a href="{{ route('deleteDevice', ['id' => $device->id]) }}">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </a> |
                                            <a href="{{ route('editDevice', ['id' => $device->id]) }}">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </a>
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