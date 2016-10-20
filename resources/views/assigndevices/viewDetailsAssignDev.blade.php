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


                        <div class="panel-heading">

                            <p class="navbar-text navbar-right"><a href="{{ route('newAssign', ['idEmployee' => $employee->id]) }}" class="navbar-link">Create <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></p>

                            <h3 class="panel-title">Devices assigned: {{ $employee->ProfileEmployee }} {{ $employee->FirstName }} {{ $employee->SecondName }}</h3>
                            <h4 class="panel-title">Department: {{$employee->Area->NameArea}}</h4>
                        </div>
                        <div class="panel-body table-hover table-striped table-responsive">

                            @include('partials/errors')
                            @include('partials/succeed')

                            <table class="table">
                                <tr>
                                    <th>Number Inventory</th>
                                    <th>Nomenclature</th>
                                    <th>Description</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Serial Number</th>
                                    <th>Color</th>
                                    <th>Description add</th>
                                </tr>

                                @forelse($employee->dataDevices as $dataDevice)
                                    <tr>
                                        <td>{{ $dataDevice->InventoryNumberDevice }}</td>
                                        <td>{{ $dataDevice->NomenclatureDevice }}</td>
                                        <td>{{ $dataDevice->DescriptionDevice }}</td>
                                        <td>{{ $dataDevice->BrandDevice }}</td>
                                        <td>{{ $dataDevice->ModelDevice }}</td>
                                        <td>{{ $dataDevice->SerialNumberDevice }}</td>
                                        <td>{{ $dataDevice->ColorDevice }}</td>
                                        <td>{{ $dataDevice->DescriptionAdDevice }}</td>
                                    </tr>
                                @empty
                                    <div class="jumbotron">
                                        <p>There is no data</p>
                                    </div>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection



