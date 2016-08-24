@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Areas
                        <a href="{{ url('areas/createArea') }}">Create new area <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                    </div>
                    <div class="panel-body">


                        <table class="table">
                            <tr>
                                <th>Name area</th>
                                <th>Unit area</th>
                                <th>Extension area</th>
                                <th>Directorate area</th>
                                <th>Actions</th>
                            </tr>

                            @foreach($areas as $area)
                                <tr>
                                    <td>{{ $area->NameArea }}</td>
                                    <td>{{ $area->UnitArea }}</td>
                                    <td>{{ $area->ExtensionArea }}</td>
                                    <td>{{ $area->DirectorateArea }}</td>
                                    <td>Edit | Delete</td>
                                </tr>
                            @endforeach

                        </table>

                        {!! $areas->render( ) !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection