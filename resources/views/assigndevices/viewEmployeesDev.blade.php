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



