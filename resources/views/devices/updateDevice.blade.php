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
                    <div class="panel-heading">Update device</div>

                    <div class="panel-body">

                        @include('partials/errors')
                        @include('partials/succeed')

                        {!! Form::model(array($devices, [
                            'method' => 'PATCH',
                            'route'  => ['updateDevice', $devices->id]
                        ])) !!}

                        <div class="form-group">
                            {!! Form::label('TypeDevice', 'Type Device') !!}
                            {!! Form::text('TypeDevice', $devices->TypeDevice, ['class' => 'form-control', 'placeholder' => 'Write type device']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('ModelDevice', 'Model Device') !!}
                            {!! Form::text('ModelDevice', $devices->ModelDevice, ['class' => 'form-control', 'placeholder' => 'Write model device']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('BrandDevice', 'Brand Device') !!}
                            {!! Form::text('BrandDevice', $devices->BrandDevice, ['class' => 'form-control', 'placeholder' => 'Write brand device']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('SerialNumberDevice', 'Serial Number Device') !!}
                            {!! Form::text('SerialNumberDevice', $devices->SerialNumberDevice, ['class' => 'form-control', 'placeholder' => 'Write serial number']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('InventoryNumberDevice', 'Inventory Number Device') !!}
                            {!! Form::text('InventoryNumberDevice', $devices->InventoryNumberDevice, ['class' => 'form-control', 'placeholder' => 'Write inventory number']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('supplier_id', 'Select supplier') !!}
                            {{ Form::select('supplier_id', $suppliers) }}
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



