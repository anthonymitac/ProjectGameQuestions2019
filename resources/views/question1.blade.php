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
                                @foreach ($questionall as $ques )
                                    
                                    <h2>{{ $ques->questionname }}</h2>
                                @endforeach
                            </label>

                            <!-- ESTE FORM ENVIA LAS RESPUESTAS AL CONTROLLADOR GAMECONTROLLER -->
                            
                            <form action="../home/verification/{{ Auth::user()->id }}/{{ 2 }}" method="POST" >
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                {{ method_field('POST') }}

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="POST">
                                
                                <p class="questions1">
                                    <label class="answer">ALTERNATIVES:
                                        <br>
                                        <br>
                                        <input type="radio" name="question" value="346465768"> Principio de Segregación de Interfaces.
                                        <br>
                                        <br>
                                        <!-- HACEMOS UN RECORRIDO PARA MOSTRAR LA RESPUESTA DE LA PRIMERA PREGUNTA DE LA TABLA QUESTION   -->
                                        <input type="radio" name="question" value="1"> 
                                                @foreach ($answer as $ans)
                                                    {{ $ans->answername }}
                                                @endforeach
                                        <br>
                                        <br>
                                        <input type="radio" name="question" value="5575673"> Principio de Sustitución de LisKov.
                                        <br>
                                        <br>
                                        <input type="radio" name="question" value="2342353"> Ninguno de los anteriores.
                                        <br>
                                        <br>
                                    </label>
                                </p>
                                <input  type="submit" value="ENVIAR"></p>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        
    </body>
</html>