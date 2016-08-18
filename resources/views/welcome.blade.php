@extends('layouts.app')

@section('content')
    @if(Auth::guest())
        <div class="container">
           <h1 class="page-header">Bienvenido<small> Inicie sesión</small></h1>
        </div>
    @else
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">Bienvenido</div>

                        <div class="panel-body">
                            Plataforma web en construcción
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
