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



//
@extends('layouts.print')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">

                    <p class="text-center">HOJA DE RECEPCIÓN DE EQUIPO DE CÓMPUTO</p>
                    <p class="text-center">COORDINACIÓN DE INFORMÁTICA</p>
                    <table class="table treceptiondate">
                        <tr>
                            <td><strong>Fecha de recepción:</strong>

                                <ins>{{ $reception->created_at->toFormattedDateString() }}</ins>

                            </td>
                            <td><strong>Hora:</strong> {{ date('h:i:s A', strtotime($reception->created_at)) }}</td>
                            <td><strong>Folio:</strong> {{ $reception->id }}</td>
                        </tr>
                    </table>
                    <p><strong>ÁREA QUE SOLICITA</strong></p>
                    <table class="table treception">
                        <tr>
                            <td><strong>UNIDAD:</strong> <ins>{{ $employee->area->UnitArea }}</ins></td>
                            <td><strong>EXT:</strong> <ins>{{ $employee->area->ExtensionArea }}</ins></td>
                        </tr>
                        <tr>
                            <td><strong>DIRECCIÓN:</strong> <ins>{{ $employee->area->DirectorateArea }}</ins></td>
                            <td><strong>NO. OFICIO:</strong> <ins>{{ $reception->NumberDoc }}</ins></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>ÁREA:</strong> <ins>{{ $employee->area->NameArea }}</ins></p>
                            </td>
                            <td></td>
                        </tr>
                    </table>
                    <p><strong>PROPIETARIO DEL EQUIPO</strong></p>
                    <table class="table treception">
                        <tr>
                            <td>{{ $reception->equipment->full_name }}</td>
                        </tr>
                    </table>
                    <p><strong>DATOS DEL EQUIPO</strong></p>
                    <table class="table treception">
                        <tr>
                            <td><strong>EQUIPO:</strong> {{ $reception->equipment->DescriptionEquipment }}</td>
                            <td><strong>NOMENCLATURA:</strong> {{ $reception->equipment->NomenclatureEquipment }}</td>
                        </tr>
                        <tr>
                            <td><strong>TIPO:</strong> {{ $reception->equipment->TypeEquipment }}</td>
                            <td><strong>NO DE SERIE:</strong> {{ $reception->equipment->SerialNumberEquipment }}</td>
                        </tr>
                        <tr>
                            <td><strong>MARCA:</strong> {{ $reception->equipment->BrandEquipment }}</td>
                            <td><strong>NO DE INVENTARIO:</strong> {{ $reception->equipment->InventoryNumberEquipment }}</td>
                        </tr>
                        <tr>
                            <td><strong>MODELO:</strong> {{ $reception->equipment->ModelEquipment }}</td>
                            <td><strong>COLOR:</strong> {{ $reception->equipment->ColorEquipment }}</td>
                        </tr>
                    </table>
                    <table class="table treceptiondate">
                        <tr>
                            <td><strong>Especificación del trabajo:</strong></td>
                            <td><strong>Accesorios adicionales:</strong></td>
                        </tr>
                        <tr>
                            <td>{{ $reception->TypeTrouble }}</td>
                            <td>
                                @if( empty($reception->AccessoryAdd))
                                    Ninguno
                                @else
                                    {{ $reception->AccessoryAdd }}
                                @endif
                            </td>
                        </tr>
                    </table>
                    <table class="table treceptiondate">
                        <tr>
                            <td><strong>Motivo:</strong> </td>
                            <td><strong>Estado del equipo</strong></td>
                            @if((($reception->StatusEquipment) === 'GenerateDictum') & (! empty($reception->NumberDictum)))
                                <td>
                                    <strong>Número de dictamen</strong>
                                </td>
                            @endif
                        </tr>
                        <tr>
                            <td><ins>{{ $reception->ReasonReception }}</ins></td>
                            <td>
                                @if( ($reception->StatusEquipment) === 'Ready')
                                    Listo
                                @elseif(($reception->StatusEquipment) === 'GenerateDictum')
                                    Se generó dictamen
                                @else
                                    Aun sin definir
                                @endif
                            </td>

                            @if((($reception->StatusEquipment) === 'GenerateDictum') & (! empty($reception->NumberDictum)))
                                <td>
                                    <ins>{{ $reception->NumberDictum }}</ins>
                                </td>
                            @endif

                        </tr>
                    </table>
                    <table class="table treceptiondate">
                        <tr>
                            <td><strong>Técnico asignado</strong></td>
                            <td><strong>Observaciones</strong></td>
                        </tr>
                        <tr>
                            <td><ins>{{ $reception->user->name }}</ins></td>
                            <td><ins>{{ $reception->ObservationReception }}</ins></td>
                        </tr>
                        <tr>
                            <td><strong>Contacto</strong></td>
                        </tr>
                        <tr>
                            <td><ins>{{ $reception->user->contact }}</ins></td>
                        </tr>
                    </table>
                    <table class="table treceptiondate">
                        <tr>
                            <td><p class="text-center"><strong>Recepciona</strong></p></td>
                            <td><p class="text-center"><strong>Solicita</strong></p></td>
                            <td><p class="text-center"><strong>Recibe</strong></p></td>
                        </tr>

                        <tr>
                            <td><p class="text-center">___________________</p></td>
                            <td><p class="text-center">___________________</p></td>
                            <td><p class="text-center">___________________</p></td>
                        </tr>

                        <tr>
                            <td>
                                <p class="text-center">Firma</p>
                                <p class="text-center">{{ $reception->Receptionist }}</p>
                            </td>
                            <td>
                                <p class="text-center">Firma</p>
                                <p class="text-center">{{ $reception->Petitioner }}</p>
                            </td>
                            <td>
                                <p class="text-center">Firma</p>
                                <p class="text-center">{{ $reception->Receive }}</p>
                            </td>
                        </tr>
                    </table>
                    @endif
                </div>
            </div>
        </div>
@endsection

//


<div class="col-md-10 col-md-offset-1">
    <div class="col-xs-10 col-md-1 pull-left">
        {{ Html::image('images/logoqroo.png', "Imagen no encontrada", array('id' => 'logoqroo', 'title' => 'Logo Quintana Roo')) }}
    </div>
    <div class="col-xs-10 col-md-4 pull-right">
        {{ Html::image('images/logosalud.png', "Imagen no encontrada", array('id' => 'logosalud', 'title' => 'Logo Salud')) }}
    </div>
</div>


//
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

//


@if(Auth::user()->isAdmin())
    @include('partials.nav.admin');
    @endIf

@if(Auth::user()->isStudent())
    @include('partials.nav.user');
@endIf


    //

    @extends('layouts.app')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="col-xs-10 col-md-1 pull-left">
                            {{ Html::image('images/logoqroo.png', "Imagen no encontrada", array('id' => 'logoqroo', 'title' => 'Logo Quintana Roo')) }}
                        </div>
                        <div class="col-xs-10 col-md-4 pull-right">
                            {{ Html::image('images/logosalud.png', "Imagen no encontrada", array('id' => 'logosalud', 'title' => 'Logo Salud')) }}
                        </div>
                    </div>

                    <p class="text-center">HOJA DE RECEPCIÓN DE EQUIPO DE CÓMPUTO</p>
                    <p class="text-center">COORDINACIÓN DE INFORMÁTICA</p>
                    <table class="table treceptiondate">
                        <tr>
                            <td><strong>Fecha de recepción:</strong>

                                <ins>{{ $reception->created_at->toFormattedDateString() }}</ins>

                            </td>
                            <td><strong>Hora:</strong> {{ date('h:i:s A', strtotime($reception->created_at)) }}</td>
                            <td><strong>Folio:</strong> {{ $reception->id }}</td>
                        </tr>
                    </table>
                    <p><strong>ÁREA QUE SOLICITA</strong></p>
                    <table class="table treception">
                        <tr>
                            <td><strong>UNIDAD:</strong> <ins>{{ $employee->area->UnitArea }}</ins></td>
                            <td><strong>EXT:</strong> <ins>{{ $employee->area->ExtensionArea }}</ins></td>
                        </tr>
                        <tr>
                            <td><strong>DIRECCIÓN:</strong> <ins>{{ $employee->area->DirectorateArea }}</ins></td>
                            <td><strong>NO. OFICIO:</strong> <ins>{{ $reception->NumberDoc }}</ins></td>
                        </tr>
                        <tr>
                            <td>
                                <p><strong>ÁREA:</strong> <ins>{{ $employee->area->NameArea }}</ins></p>
                            </td>
                            <td></td>
                        </tr>
                    </table>
                    <p><strong>PROPIETARIO DEL EQUIPO</strong></p>
                    <table class="table treception">
                        <tr>
                            <td>{{ $reception->equipment->full_name }}</td>
                        </tr>
                    </table>
                    <p><strong>DATOS DEL EQUIPO</strong></p>
                    <table class="table treception">
                        <tr>
                            <td><strong>EQUIPO:</strong> {{ $reception->equipment->DescriptionEquipment }}</td>
                            <td><strong>NOMENCLATURA:</strong> {{ $reception->equipment->NomenclatureEquipment }}</td>
                        </tr>
                        <tr>
                            <td><strong>TIPO:</strong> {{ $reception->equipment->TypeEquipment }}</td>
                            <td><strong>NO DE SERIE:</strong> {{ $reception->equipment->SerialNumberEquipment }}</td>
                        </tr>
                        <tr>
                            <td><strong>MARCA:</strong> {{ $reception->equipment->BrandEquipment }}</td>
                            <td><strong>NO DE INVENTARIO:</strong> {{ $reception->equipment->InventoryNumberEquipment }}</td>
                        </tr>
                        <tr>
                            <td><strong>MODELO:</strong> {{ $reception->equipment->ModelEquipment }}</td>
                            <td><strong>COLOR:</strong> {{ $reception->equipment->ColorEquipment }}</td>
                        </tr>
                    </table>
                    <table class="table treceptiondate">
                        <tr>
                            <td><strong>Especificación del trabajo:</strong></td>
                            <td><strong>Accesorios adicionales:</strong></td>
                        </tr>
                        <tr>
                            <td>{{ $reception->TypeTrouble }}</td>
                            <td>
                                @if( empty($reception->AccessoryAdd))
                                    Ninguno
                                @else
                                    {{ $reception->AccessoryAdd }}
                                @endif
                            </td>
                        </tr>
                    </table>
                    <table class="table treceptiondate">
                        <tr>
                            <td><strong>Motivo:</strong> </td>
                            <td><strong>Estado del equipo</strong></td>
                            @if((($reception->StatusEquipment) === 'GenerateDictum') & (! empty($reception->NumberDictum)))
                                <td>
                                    <strong>Número de dictamen</strong>
                                </td>
                            @endif
                        </tr>
                        <tr>
                            <td><ins>{{ $reception->ReasonReception }}</ins></td>
                            <td>
                                @if( ($reception->StatusEquipment) === 'Ready')
                                    Listo
                                @elseif(($reception->StatusEquipment) === 'GenerateDictum')
                                    Se generó dictamen
                                @else
                                    Aun sin definir
                                @endif
                            </td>

                            @if((($reception->StatusEquipment) === 'GenerateDictum') & (! empty($reception->NumberDictum)))
                                <td>
                                    <ins>{{ $reception->NumberDictum }}</ins>
                                </td>
                            @endif

                        </tr>
                    </table>
                    <table class="table treceptiondate">
                        <tr>
                            <td><strong>Técnico asignado</strong></td>
                            <td><strong>Observaciones</strong></td>
                        </tr>
                        <tr>
                            <td><ins>{{ $reception->user->name }}</ins></td>
                            <td><ins>{{ $reception->ObservationReception }}</ins></td>
                        </tr>
                        <tr>
                            <td><strong>Contacto</strong></td>
                        </tr>
                        <tr>
                            <td><ins>{{ $reception->user->contact }}</ins></td>
                        </tr>
                    </table>
                    <table class="table treceptiondate">
                        <tr>
                            <td><p class="text-center"><strong>Recepciona</strong></p></td>
                            <td><p class="text-center"><strong>Solicita</strong></p></td>
                            <td><p class="text-center"><strong>Recibe</strong></p></td>
                        </tr>

                        <tr>
                            <td><p class="text-center">________________________________</p></td>
                            <td><p class="text-center">________________________________</p></td>
                            <td><p class="text-center">________________________________</p></td>
                        </tr>

                        <tr>
                            <td>
                                <p class="text-center">Firma</p>
                                <p class="text-center">{{ $reception->Receptionist }}</p>
                            </td>
                            <td>
                                <p class="text-center">Firma</p>
                                <p class="text-center">{{ $reception->Petitioner }}</p>
                            </td>
                            <td>
                                <p class="text-center">Firma</p>
                                <p class="text-center">{{ $reception->Receive }}</p>
                            </td>
                        </tr>
                    </table>
                    @endif
                </div>
            </div>
            <div class="form-group pull-left">
                <a class="btn btn-success btn-close" href="{{ route('seeReceptions') }}">Regresar</a>
            </div>
            <div class="form-group pull-left">
                <a href="{{ route('printReception', ['idRec' => $reception->id, 'idEmp' => $reception->equipment->employee_id]) }}"><button type="button" class="btn btn-info btn-sm">Imprimir</button></a>
            </div>
        </div>
@endsection


