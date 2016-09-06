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
                        <div class="panel-heading">Employees
                            <a href="{{ url('employees/create') }}">Create
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        </div>
                        <div class="panel-body">

                            @include('partials/errors')
                            @include('partials/succeed')

                            <table class="table table-hover table-striped table-responsive">
                                <tr>
                                    <th>Profile Employe</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Role Employee</th>
                                    <th>Area</th>
                                    <th>Actions</th>
                                </tr>
                                @foreach($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->ProfileEmployee }}</td>
                                        <td>{{ $employee->FirstName }}</td>
                                        <td>{{ $employee->SecondName }}</td>
                                        <td>{{ $employee->RoleEmployee }}</td>
                                        <td>{{ $employee->area->NameArea }}</td>
                                        <td>
                                            <a href="{{ route('deleteEmployee', ['id' => $employee->id]) }}">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </a> |
                                            <a href="{{ route('editEmployee', ['id' => $employee->id]) }}">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            {!! $employees->render( ) !!}
                        </div>
    @endif
                    </div>
                </div>
            </div>
        </div>
@endsection