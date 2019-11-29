@extends('template.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <hr>
                            @if(!Auth::guest())
                            <p><strong>{{ Auth::user()->name }}</strong></p>
                            <p>Email:</p>
                            <br>
                            <p><strong>{{ Auth::user()->email }}</strong></p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">¡Hola!</div>
                <br><br>
                <div class="panel-body"><strong>
                    ¡Bienvenido {{ Auth::user()->name }}! Es bueno tenerte de vuelta.
                    </strong>
                </div>
            </div>
        </div>
    </div>
    @else
    <p> ¡Bienvenido! Por favor <a class="nav-link" href="{{ route('login') }}">inicia sesion</a> para continuar.</p>
    @endif

</div>
@endsection
