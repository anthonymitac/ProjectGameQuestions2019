<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
class GameController extends Controller{

    function controlleranswer(REQUEST $request){
        dd($request->question1);
        return ;
    }
}