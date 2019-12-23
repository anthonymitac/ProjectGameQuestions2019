<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;
use App\User;
use App\Answer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    function startGame(REQUEST $request){
        
        $numQuestion = $request->question;
        //ENVIAR LOS DATOS DE LAS PREGUNTAS Y RESPUESTAS A LA  VISTA QUESTIONS
        $questionall=Questions::all();
        $answer=Answer::all();
        //VERIFICAR EL NUMERO DE PREGUNTA
        switch ($numQuestion){
            case 1:
                return view('Questions.question1',compact('questionall','answer'));
            break;
            case 2:
                return view('Questions.question2',compact('questionall','answer'));
            break;
                
            case 3:
                return view('Questions.question3',compact('questionall','answer'));

        }
        

        
    }
    
}
