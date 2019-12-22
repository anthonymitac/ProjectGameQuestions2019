<!DOCTYPE html>
<html>
    <head>
        <link href="{{ asset('Estilos/stylos.css') }}" rel="stylesheet">
    </head>

    <body>
        <script language="javascript">
            alert('Mi primer alerta en Script');
        </script>
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
                    
                            <label>
                                @foreach ($question as $ques )
                                    @if ($ques->id==1)
                                        <h2>{{ $ques->questionname }}</h2>
                                    @endif
                                @endforeach
                            </label>
                            <form action="home/verification" method="POST" >
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                {{ method_field('POST') }}

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="POST">
                                
                                <p class="questions1">
                                    <label class="answer">ALTERNATIVAS:
                                        <br>
                                        <br>
                                        <input type="radio" name="question1" value="1"> Principio de Segregación de Interfaces.
                                        <br>
                                        <br>
                                        <input type="radio" name="question1" value="2"> 
                                                @foreach ($answer as $ans)
                                                    @if ($ans->id==1)
                                                        {{ $ans->answername }}
                                                    @endif
                                                @endforeach
                                        <br>
                                        <br>
                                        <input type="radio" name="question1" value="3"> Principio de Sustitución de LisKov.
                                        <br>
                                        <br>
                                        <input type="radio" name="question1" value="4"> Ninguno de los anteriores.
                                        <br>
                                        <br>
                                    </label>
                                </p>
                                <input type="submit" value="Calificar"></p>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        
    </body>
</html>