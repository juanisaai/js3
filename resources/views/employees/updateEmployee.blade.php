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
                    <div class="panel-heading">Update employee</div>

                    <div class="panel-body">

                        @include('partials/errors')
                        @include('partials/succeed')

                        {!! Form::model(array($employee, [
                            'method' => 'PATCH',
                            'route'  => ['updateEmployee', $employee->id]
                        ])) !!}

                        <div class="form-group">
                            {!! Form::label('ProfileEmployee', 'Profile Employee') !!}
                            {!! Form::text('ProfileEmployee', $employee->ProfileEmployee, ['class' => 'form-control', 'placeholder' => 'Write profile employee']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('FirstName', 'First Name') !!}
                            {!! Form::text('FirstName', $employee->FirstName, ['class' => 'form-control', 'placeholder' => 'Write first name']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('SecondName', 'Last Name') !!}
                            {!! Form::text('SecondName', $employee->SecondName, ['class' => 'form-control', 'placeholder' => 'Write last name']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('RoleEmployee', 'Role Employee') !!}
                            {!! Form::text('RoleEmployee', $employee->RoleEmployee, ['class' => 'form-control', 'placeholder' => 'Write role employee']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('area_id', 'Select area') !!}
                            {{ Form::select('area_id', $areas) }}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                        </div>


                        {{ Form::close() }}

                    </div>

    @endif

                </div>
            </div>
        </div>
@endsection



