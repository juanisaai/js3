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
                <div class="panel-heading">Create a new area</div>

                <div class="panel-body">

                    @include('partials/errors')
                    @include('partials/succeed')

                    {!! Form::open(array('url' => 'areas', 'method' => 'POST', 'class' => 'form')) !!}

                    <div class="form-group">
                        {!! Form::label('namearea', 'Name Area') !!}
                        {!! Form::text('NameArea', null, ['class' => 'form-control', 'placeholder' => 'Write name area']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('unitarea', 'Unit') !!}
                        {!! Form::text('UnitArea', null, ['class' => 'form-control', 'placeholder' => 'Write unit']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('extensionarea', 'Name Extension') !!}
                        {!! Form::text('ExtensionArea', null, ['class' => 'form-control', 'placeholder' => 'Write name extension']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('directoratearea', 'Name Directorate') !!}
                        {!! Form::text('DirectorateArea', null, ['class' => 'form-control', 'placeholder' => 'Write name Directorate']) !!}
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



