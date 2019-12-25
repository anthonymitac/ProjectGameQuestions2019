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
                            <h1>PREGUNTA 1:</h1>
                    <!-- ESTE FOREACH MUESTRA LA PRIMERA PREGUNTA -->
                            <label>
                            <h2>{{$questionall[0]->questionname}}</h2>
                            </label>



                            <!-- ESTE FORM ENVIA LAS RESPUESTAS AL CONTROLLADOR GAMECONTROLLER -->

                            <form action="/home/verification/" method="POST">
                                <div class="form-group">

                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                @foreach($answers as $answer)

                                <label class="text-white" >
                                    <input type="radio" class="text-white" name="user_id" id="{{$answer->id}}" value="{{$answer->id}}"> {{$answer->answername}}
                                </label>

                                @endforeach
                            </div>
                            <input type="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

    </body>
</html>
