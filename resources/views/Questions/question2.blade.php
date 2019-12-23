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
                    <!-- ESTE FOREACH MUESTRA LA SEGUNDA PREGUNTA-->
                            <label>
                                @foreach ($questionall as $ques )
                                    @if ($ques->id==2)
                                        <h2>{{ $ques->questionname }}</h2>
                                    @endif
                                @endforeach
                            </label>

                            <!-- ESTE FORM ENVIA LAS RESPUESTAS AL CONTROLLADOR GAMECONTROLLER -->
                            
                            <form action="../home/verification/{{ Auth::user()->id }}" method="POST" >
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                {{ method_field('POST') }}

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="POST">
                                
                                <p class="questions1">
                                    <label class="answer">ALTERNATIVES:
                                        <br>
                                        <br>
                                        <input type="radio" name="question" value="1"> Patrón de Diseño de Componentes Altamente Cohesivos.
                                        <br>
                                        <br>
                                        <input type="radio" name="question" value="3"> Patrón de Separación de Preocupaciones/Responsabilidades.
                                        <br>
                                        <br>
                                        <!-- HACEMOS UN RECORRIDO PARA MOSTRAR LA RESPUESTA DE LA SEGUNDA PREGUNTA DE LA TABLA QUUESTION   -->
                                        <input type="radio" name="question" value="2"> 
                                                @foreach ($answer as $ans)
                                                    @if ($ans->id==2)
                                                        {{ $ans->answername }}
                                                    @endif
                                                @endforeach
                                        <br>
                                        <br>
                                        <input type="radio" name="question" value="4"> Ninguno de los anteriores.
                                        <br>
                                        <br>
                                    </label>
                                </p>
                                <input type="submit" value="ENVIAR"></p>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        
    </body>
</html>