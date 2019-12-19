<!DOCTYPE html>
<html>
    <head>
        <link href="{{ asset('Estilos/stylos.css') }}" rel="stylesheet">
    </head>

    <body>
        @extends('layouts.app')

        @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            BIENVENIDO {{ Auth::user()->name }}
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <button onclick="window.location='home/levels/level1'" method='post'>
                                <p class="titlelevel1">LEVEL 1</p>
                                
                                <strong><p class="themelevel1">ALL UML</p></strong>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        
    </body>
</html>