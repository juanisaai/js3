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
                    <div class="panel-heading">Update area</div>

                    <div class="panel-body">

                        @include('partials/errors')
                        @include('partials/succeed')

                        {!! Form::model(array($area, [
                            'method' => 'PATCH',
                            'route'  => ['updateArea', $area->id]
                        ])) !!}

                        <div class="form-group">
                            {!! Form::label('namearea', 'Name Area') !!}
                            {!! Form::text('NameArea', $area->NameArea, ['class' => 'form-control', 'placeholder' => 'Write name area']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('unitarea', 'Unit') !!}
                            {!! Form::text('UnitArea', $area->UnitArea, ['class' => 'form-control', 'placeholder' => 'Write unit']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('extensionarea', 'Name Extension') !!}
                            {!! Form::text('ExtensionArea', $area->ExtensionArea, ['class' => 'form-control', 'placeholder' => 'Write name extension']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('directoratearea', 'Name Directorate') !!}
                            {!! Form::text('DirectorateArea', $area->DirectorateArea, ['class' => 'form-control', 'placeholder' => 'Write name Directorate']) !!}
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



