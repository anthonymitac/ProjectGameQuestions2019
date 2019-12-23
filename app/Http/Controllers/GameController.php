<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Game;
use App\Questions;
use App\Answer;
class GameController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function verification(REQUEST $request,$user_id){        
        //VERIFICAMOS SI LA RESPUESTA ES CORRECTA
        $answer=Answer::find($request->question);

        $recordGame=Game::all()->where('user_id','=',$user_id);
        
        if (!empty($answer)){
            if(!empty($recordGame)){
                dd($recordGame);
                // NO CREARA UN NUEVO REGISTRO EN LA TABLA GAME
                
                return  view('NextPage.index');
            }
            else{
            //CREARA UN NUEVO REGISTRO EN LA TABLA GAME
                $game= new Game;
                $game->user_id=$user_id;
                $game->score=0;
                $game->save();        
                return  view('NextPage.index');
            }
        }
        
        //SI NO EXISTE UN REGISTRO DEL JUGADOR
        else{
            if (empty($recordGame)){
                //CREAMOS UN REGISTRO DE ESE JUGADOR AUNQUE LA RESPUESTA AYA ESTADO INCORRECTO
                $game= new Game;
                $game->user_id=$user_id;
                $game->score=$score;
                $game->save();
                //REENVIAMOS A NEXTPAGE
                return  view('NextPage.index');
            }
            else{
                dd($recordGame->pluck('score'));
            }
        }

       //REENVIAMOS A NEXTPAGE
       return  view('NextPage.index');
    }
}