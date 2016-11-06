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
                        <div class="panel-heading">HOJA DE RECEPCIÓN DE EQUIPO DE CÓMPUTO COORDINACIÓN DE INFORMÁTICA</div>
                        <div class="panel-body table-hover table-striped table-responsive">

                            @include('partials/errors')
                            @include('partials/succeed')

                            <h3>Datos de recepción <span class="label label-default"></span></h3>
                            <p><strong>Fecha de recepción </strong>{{ date('d F Y', strtotime($reception->created_at)) }}</p>
                            <p><strong>Hora de recepción </strong>{{ date('h:i:s A', strtotime($reception->created_at)) }}</p>
                            <p><strong>Folio </strong>{{ $reception->id }}</p>

                            <h3>Área que solicita <span class="label label-default"></span></h3>
                            <p><strong>Unidad </strong>{{ $employee->area->UnitArea }}</p>
                            <p><strong>Dirección </strong>{{ $employee->area->DirectorateArea }}</p>
                            <p><strong>Área </strong>{{ $employee->area->NameArea }}</p>
                            <p><strong>EXT </strong>{{ $employee->area->ExtensionArea }}</p>

                            <h3>Propietario del equipo <span class="label label-default"></span></h3>
                            <p><strong></strong>{{ $reception->equipment->full_name }}</p>

                            <h3>Datos del equipo <span class="label label-default"></span></h3>
                            <p><strong>Equipo </strong>{{ $reception->equipment->DescriptionEquipment }}</p>
                            <p><strong>Tipo </strong>{{ $reception->equipment->TypeEquipment }}</p>
                            <p><strong>Marca </strong>{{ $reception->equipment->BrandEquipment }}</p>
                            <p><strong>Modelo </strong>{{ $reception->equipment->ModelEquipment }}</p>
                            <p><strong>Nomenclatura </strong>{{ $reception->equipment->NomenclatureEquipment }}</p>
                            <p><strong>No. Serie </strong>{{ $reception->equipment->SerialNumberEquipment }}</p>
                            <p><strong>No. Inventario </strong>{{ $reception->equipment->InventoryNumberEquipment }}</p>
                            <p><strong>Color </strong>{{ $reception->equipment->ColorEquipment }}</p>


                            <h3>Datos de recepción <span class="label label-default"></span></h3>
                            <p><strong>Tipo de problema </strong>{{ $reception->TypeTrouble }}</p>
                            <p><strong>Razón de la recepción </strong>{{ $reception->ReasonReception }}</p>
                            <p><strong>Técnico asignado </strong>{{ $reception->user->name }}</p>
                            <p><strong>Contacto </strong>{{ $reception->user->contact }}</p>
                            <p><strong>Observaciones </strong>{{ $reception->ObservationReception }}</p>
                            <p><strong>Recepciona </strong>{{ $reception->Receptionist }}</p>
                            <p><strong>Solicita </strong>{{ $reception->Petitioner }}</p>
                            <p><strong>Recibe </strong>{{ $reception->Receive }}</p>

                            <p><strong>Estado del equipo </strong>
                                @if( ($reception->StatusEquipment) === 'Ready')
                                    Listo
                                @elseif(($reception->StatusEquipment) === 'GenerateDictum')
                                    Se generó dictamen
                                @else
                                    Aun sin definir
                                @endif
                            </p>

                            @if((($reception->StatusEquipment) === 'GenerateDictum') & (! empty($reception->NumberDictum)))
                            <p><strong>Número de dictamen </strong>{{ $reception->NumberDictum }}</p>
                            @endif
                        </div>
    @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
