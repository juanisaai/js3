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
                <div class="panel-heading">Create a new user</div>

                <div class="panel-body">

                    @include('partials/errors')
                    @include('partials/succeed')

                    {!! Form::open(array('url' => 'users', 'method' => 'POST', 'class' => 'form')) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Write name user']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('username', 'Username') !!}
                        {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Write username']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Write email']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password', 'Password') !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Write password']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('active', 'Select status') !!}
                        {!! Form::select('active',[ '1' => 'Active', '0' => 'Disabled'], '1' ) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('type', 'Select type') !!}
                        {!! Form::select('type',[ 'Admin' => 'Manager', 'User' => 'User'], 'User' ) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                    </div>


                    {{ Form::close() }}

                </div>


    @endif
            </div>
        </div>
    </div>
@endsection



