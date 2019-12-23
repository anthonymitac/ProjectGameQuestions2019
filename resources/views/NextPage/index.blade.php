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
                            {{ 'WELCOME USER ' }} {{ Auth::user()->name }}
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form action="../../home/startedGame"  method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                {{ method_field('POST') }}

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="POST">
                                <button name="question" value="2" class="buttonStarted" >
                                
                                    SIGUIENTE PREGUNTA
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        
    </body>
</html>