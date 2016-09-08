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
                        <div class="panel-heading">Suppliers
                            <a href="{{ route('createSupplier') }}">Create
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        </div>
                        <div class="panel-body">

                            @include('partials/errors')
                            @include('partials/succeed')

                            <table class="table table-hover table-striped table-responsive">
                                <tr>
                                    <th>Name supplier</th>
                                    <th>Actions</th>
                                </tr>
                                @foreach($suppliers as $supplier)
                                    <tr>
                                        <td>{{ $supplier->NameSupplier }}</td>
                                        <td>
                                            <a href="{{ route('deleteSupplier', ['id' => $supplier->id]) }}">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </a> |
                                            <a href="{{ route('editSupplier', ['id' => $supplier->id]) }}">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {!! $suppliers->render( ) !!}
                        </div>
    @endif
                    </div>
                </div>
            </div>
        </div>
@endsection