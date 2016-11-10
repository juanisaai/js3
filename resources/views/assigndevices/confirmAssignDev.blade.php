@extends('layouts.app')

@section('content')

    @if (Auth::guest())

        @include('partials/login')


    @else

        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Nueva asignación</div>

                    <div class="panel-body">

                        @include('partials/errors')
                        @include('partials/succeed')

                        {!! Form::model(array($devices, [
                            'method' => 'PATCH',
                            'route'  => ['updateDevice', $devices->id]
                        ])) !!}



                        <div class="form-group">
                            {!! Form::submit('Asignar', ['class' => 'btn btn-primary']) !!}
                        </div>


                        {{ Form::close() }}



                    </div>

    @endif

                </div>
            </div>
        </div>
@endsection



