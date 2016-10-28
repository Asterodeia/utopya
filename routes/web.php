<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use Illuminate\Http\Request;
use App\Http\Controllers\PersoController;

Route::resource('persos', 'PersoController', ['only' => [
    'create', 'store'
]]);
Route::get('/persos/play/{persoId}', 'PersoController@play');
Route::post('/persos/logout', 'PersoController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/', function(){
    return view('index');
});

Route::get('/ej/home', 'EJ\EJHomeController@index');
