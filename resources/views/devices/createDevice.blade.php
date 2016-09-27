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
                <div class="panel-heading">Create a new device</div>

                <div class="panel-body">

                    @include('partials/errors')
                    @include('partials/succeed')

                    {!! Form::open(array('url' => 'devices', 'method' => 'POST', 'class' => 'form')) !!}

                    <div class="form-group">
                        {!! Form::label('TypeDevice', 'Type Device') !!}
                        {!! Form::text('TypeDevice', null, ['class' => 'form-control', 'placeholder' => 'Write type device']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('BrandDevice', 'Brand Device') !!}
                        {!! Form::text('BrandDevice', null, ['class' => 'form-control', 'placeholder' => 'Write brand device']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('ModelDevice', 'Model Device') !!}
                        {!! Form::text('ModelDevice', null, ['class' => 'form-control', 'placeholder' => 'Write model device']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('ColorDevice', 'Color Device') !!}
                        {!! Form::text('ColorDevice', null, ['class' => 'form-control', 'placeholder' => 'Write color device']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('NomenclatureDevice', 'Nomenclature Device') !!}
                        {!! Form::text('NomenclatureDevice', null, ['class' => 'form-control', 'placeholder' => 'Write nomenclature device']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('SerialNumberDevice', 'Serial Number Device') !!}
                        {!! Form::text('SerialNumberDevice', null, ['class' => 'form-control', 'placeholder' => 'Write serial number']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('InventoryNumberDevice', 'Inventory Number Device') !!}
                        {!! Form::text('InventoryNumberDevice', null, ['class' => 'form-control', 'placeholder' => 'Write inventory number']) !!}
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



