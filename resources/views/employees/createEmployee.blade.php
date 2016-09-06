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
                <div class="panel-heading">Create a new employee</div>

                <div class="panel-body">

                    @include('partials/errors')
                    @include('partials/succeed')

                    {!! Form::open(array('url' => 'employees', 'method' => 'POST', 'class' => 'form')) !!}

                    <div class="form-group">
                        {!! Form::label('ProfileEmployee', 'Profile Employee') !!}
                        {!! Form::text('ProfileEmployee', null, ['class' => 'form-control', 'placeholder' => 'Write name profile employee']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('FirstName', 'First Name') !!}
                        {!! Form::text('FirstName', null, ['class' => 'form-control', 'placeholder' => 'Write first name']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('SecondName', 'Last Name') !!}
                        {!! Form::text('SecondName', null, ['class' => 'form-control', 'placeholder' => 'Write second name']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('RoleEmployee', 'Role Employee') !!}
                        {!! Form::text('RoleEmployee', null, ['class' => 'form-control', 'placeholder' => 'Write role employee']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('area_id', 'Select area') !!}
                        {{ Form::select('area_id', $areas) }}
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



