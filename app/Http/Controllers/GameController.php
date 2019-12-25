<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Game;
use App\Questions;
use App\Answer;
use App\AnswerUser;
class GameController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function verification(Request $request){
        //VERIFICAMOS SI LA RESPUESTA ES CORRECTA, HACIENDO UNA CONSULTA
        //EN LA BASE DE DATOS.
        $answerrpta=Answer::find($request->question);

        //VERIFICAMOS QUE EN LA BASE DE DATOS DE GAME
        //SI EXISTE EL USUARIO O NO
        $recordGame=Game::all()->where('user_id','=',$request->user_id)->first();

        //SACAMOS LA PREGUNTA PARA ENVIARLO
        $questionall=Questions::all()->where('id','=',$request->question);

        //SACAMOS LA RESPUESTA PARA LA PREGUNTA
        $answer=Answer::all()->where('id','=',$request->question);

        //VEMOS Q SI LA RESPUESTA RECIBIDA ES CORRECTA O NO
        if (!empty($answerrpta)){

            if($recordGame==null){
                //$GA="esta vacio";
                //dd($GA);
                // CREARA UN NUEVO REGISTRO EN LA TABLA GAME
                //$rg->score=$rg->score + 1;
                //$rg->save();

                //dd($recordGame[0]->score);
                $game= new Game;
                $game->user_id=$request->user_id;
                $game->score=1;
                $game->save();
            }
            elseif($recordGame!=null &&  $request->question == 2){
                //dd("sdlsn");
                $rg=Game::find($recordGame->id);
                $rg->score=1;
                $rg->save();
            }
            else{
                //EDITARA LA TABLA GAME DEL USUARIO CON ELL CODIGO $user_id
                //SIEMPRE EN CUANDO EXISTA UN REGISTRO DE ESE USUARIO
                //sacamos el id del registro (game)
                $indexGame=$recordGame->id;
                //buscamos ese registro del game
                $rg=Game::find($indexGame);
                //dd($recordGame->id);
                //dd($rg);
                $rg->score=$rg->score+1;
                //dd($rg->score);
                //$rg = $recordGame[0];
                $rg->save();
            }

        }

        //SI NO EXISTE UN REGISTRO DEL JUGADOR
        else{
            //dd($request->question);
            if (empty($recordGame)){
                //CREAMOS UN REGISTRO DE ESE JUGADOR AUNQUE LA RESPUESTA AYA ESTADO INCORRECTO
                $game= new Game;
                $game->user_id=$request->user_id;
                $game->score=0;
                $game->save();
                //REENVIAMOS A NEXTPAGE
            }
            else{
            }

        }
        switch ($request->question){
            case 1:
                return view('question1',compact('questionall','answer'));
            break;
            case 2:
                return view('question2',compact('questionall','answer'));
            break;
            case 3:
                return view('question3',compact('questionall','answer'));
            break;
            case 4:
                return view('question4',compact('questionall','answer'));
            break;
            case 5:
                return view('question5',compact('questionall','answer'));
            break;

        }
    }
}
