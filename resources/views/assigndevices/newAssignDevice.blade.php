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
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Nueva asignación</div>

                    <div class="panel-body">

                        @include('partials/errors')
                        @include('partials/succeed')



                        @foreach($employees as $employee)
                                <strong>{{ $employee->ProfileEmployee }} {{ $employee->FirstName }} {{ $employee->SecondName }}</strong>
                                <p>{{ $employee->Area->NameArea }}</p>

                        @endforeach




                    </div>

    @endif

                </div>
            </div>
        </div>
@endsection



