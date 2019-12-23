<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
//RUTAS CREADAS CUANDO SE EJCUTA PHP ARTISAN MAKE:AUTH
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//RUTA PARA ENVIAR LA RESPUESTA

Route::post('/home/verification/{user_id}','GameController@verification');

//RUTA PARA COMENZAR EL JUEGO
Route::post('/home/startedGame','HomeController@startGame');


