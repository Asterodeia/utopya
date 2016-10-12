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
use App\Perso;
use Illuminate\Http\Request;

Route::get('/', function () {
  return view('persos', [
    'persos' => Perso::orderBy('created_at', 'asc')->get()
  ]);
});

Route::post('/perso', function (Request $request) {
  $validator = Validator::make($request->all(), [
      'name' => 'required|max:255',
  ]);

  if ($validator->fails()) {
      return redirect('/')
          ->withInput()
          ->withErrors($validator);
  }

  $perso = new Perso;
  $perso->user_id = 1;
  $perso->name = $request->name;
  $perso->race = $request->race;

  return redirect('/');

});

Route::delete('/perso/{id}', function ($id) {
  Perso::findOrFail($id)->delete();

  return redirect('/');
});
