<td>
    <a href="{{ route('deleteEmployee', ['id' => $supplier->id]) }}">
        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
    </a> |
    <a href="{{ route('editEmployee', ['id' => $supplier->id]) }}">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
    </a>
</td>



<div class="btn">
    <button type="button" class="btn btn-default" aria-haspopup="true" aria-expanded="false">
        <a href="{{ route('readAssign') }}">Back</a>
    </button>
</div>


// viewEmployeesDev

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
                        <div class="panel-heading">Assign devices</div>
                        <div class="panel-body table-hover table-striped table-responsive">

                            @include('partials/errors')
                            @include('partials/succeed')

                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Assign device</th>
                                    <th>Actions</th>
                                </tr>

                                @foreach($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->id }}</td>
                                        <td>{{ $employee->ProfileEmployee }} {{ $employee->FirstName }} {{ $employee->SecondName }}</td>
                                        <td>{{ $employee->Area->NameArea }}</td>
                                        <td>
                                            <a href="{{ route('seeDetailsAssignDev', ['id' => $employee->id]) }}">View details
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </a> |
                                            <a href="#">
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


//

//viewDetailsAssignDev

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


//

// Foreach
@foreach($employees as $employee)
    <p>
        <stron>{{ $employee->ProfileEmployee }} {{ $employee->FirstName }} {{ $employee->SecondName }}</stron>
        <strong>Devices: </strong>{{ $employee->num_devices }}
    </p>
    <p>
        {{ $employee->Area->NameArea }}
    </p>

    <ul class="list-group">
        @foreach($employee->devices as $device)
            <li class="list-group-item">{{ $device->id }}</li>
        @endforeach
    </ul>

@endforeach

//

<table class="table">
    <tr>
        <th>Empleado</th>
        <th>Departamento</th>
        <th>Acción</th>
    </tr>

    @foreach($employees as $employee)
        <tr>
            <td>{{ $employee->ProfileEmployee }} {{ $employee->FirstName }} {{ $employee->SecondName }}</td>
            <td>{{ $employee->Area->NameArea }}</td>
            <td>
                <a href="{{ route('createAssignDev', ['id' => $employee->id]) }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    Asignar
                </a>
            </td>

        </tr>
    @endforeach
</table>

//

/*$this->validate(request(), [
'employee_id' => 'required|unique:dataDevices',
]);

$data = request()->all();

$devices->fill($data)->save();
*/

