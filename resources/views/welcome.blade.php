@extends('layouts.app')

@section('content')
    @if(Auth::guest())
        <div class="container">
           <h1 class="page-header">BIENVENIDO<small> Inicie sesión</small></h1>
        </div>
    @else
        @include('partials.welcome.welcome')
    @endif
@endsection
