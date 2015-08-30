@extends('layout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>

                    <div class="panel-body">

                        @if(Auth::guest())
                        <p>Haga login para acceder a la aplicación.</p>
                        <p>Si no tiene cuenta puede registrarse</p>
                        @else
                            Bienvenido a la aplicacion {{ Auth::user()->name }}
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
