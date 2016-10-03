@extends('layouts.app')

@section('content')
    @if(Auth::guest())
        <div class="container">
           <h1 class="page-header">Welcome<small> sign in</small></h1>
        </div>
    @else
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Welcome</div>

                        <div class="panel-body">
                            Web platform coming soon
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
