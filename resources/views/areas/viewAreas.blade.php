@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        @include('partials/login')

    @else
        <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                      <div class="panel-heading">
                          <h1 class="panel-title">Áreas</h1>
                      </div>
                            <div class="panel-body table-hover table-striped table-responsive">
                                <div>
                                    <a href="{{ route('createArea') }}"><button type="button" class="btn btn-success pull-right margintab">Crear</button></a>
                                </div>
                                @include('partials/errors')
                                @include('partials/succeed')

                                <table class="table">
                                    <tr>
                                        <th>Nombre de área</th>
                                        <th>Unidad</th>
                                        <th>Extensión</th>
                                        <th>Dirección</th>
                                        <th colspan="2" class="text-center">Acciones</th>
                                    </tr>
                                    @foreach($areas as $area)
                                        <tr>
                                            <td>{{ $area->NameArea }}</td>
                                            <td>{{ $area->UnitArea }}</td>
                                            <td>{{ $area->ExtensionArea }}</td>
                                            <td>{{ $area->DirectorateArea }}</td>
                                            <td>
                                                <a href="{{ route('editArea', ['id' => $area->id]) }}"><button type="button" class="btn btn-warning btn-sm">Editar</button></a>
                                            </td>
                                            <td>
                                                <a href="{{ route('deleteArea', ['id' => $area->id]) }}"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                {!! $areas->render( ) !!}
                            </div>
                        @endif
                    </div>
            </div>
        </div>
    </div>
@endsection
