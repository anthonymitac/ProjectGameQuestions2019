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
Route::post('/home/game','GameController@controlleranswer');

//RUTA PARA ENVIAR LA RESPUESTA


