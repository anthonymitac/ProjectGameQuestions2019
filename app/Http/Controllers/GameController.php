<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
class GameController extends Controller{

    function verification(REQUEST $request){
        dd($request->question1);
        return ;
    }
}