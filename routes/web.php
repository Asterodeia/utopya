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

Auth::routes();

Route::get('/', function(){
    return view('index');
});
Route::get('/home', 'HomeController@index');

Route::get('/persos/play/{persoId}', 'PersoController@play');
Route::post('/persos/logout', 'PersoController@logout');
Route::resource('persos', 'PersoController', ['only' => [
    'create', 'store'
]]);

Route::get('/ej/home', 'EJ\EJHomeController@index');
Route::get('/ej/lieux/{id}', 'EJ\LieuController@show');
Route::get('/ej/chapitres/{id_chapitre}', 'EJ\PostController@listInChapitre');
Route::post('/ej/posts', 'EJ\PostController@store');
