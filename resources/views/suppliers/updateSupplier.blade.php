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
                    <div class="panel-heading">Update supplier</div>

                    <div class="panel-body">

                        @include('partials/errors')
                        @include('partials/succeed')

                        {!! Form::model(array($supplier, [
                            'method' => 'PATCH',
                            'route'  => ['updateSupplier', $supplier->id]
                        ])) !!}

                        <div class="form-group">
                            {!! Form::label('NameSupplier', 'Name Supplier') !!}
                            {!! Form::text('NameSupplier', $supplier->NameSupplier, ['class' => 'form-control', 'placeholder' => 'Write Name supplier']) !!}
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



