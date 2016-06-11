<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('front');
});

Route::get('/schulen', function () {
    $data = App\schulen::all();
    return view('master', compact("data"));
});

Route::get('/schulen/{page}', function ($page) {
    $data = App\schulen::all()::paginate(25);
    return view('master', compact("data"));
});


Route::get('/schule/{id}', function ($schule) {
  $schule = App\schulen::find($schule);
  $hochwert = $schule->adresse->lat; //hochwert
  $rechtswert = $schule->adresse->lon; //rechtswert
  return view('detail', compact("schule", "hochwert", "rechtswert"));
});

Route::get('/schule/{id}/karte', function ($schule) {
  $schule = App\schulen::find($schule);
  $hochwert = $schule->adresse->lat; //hochwert
  $rechtswert = $schule->adresse->lon; //rechtswert
  return view('karten', compact("hochwert", "rechtswert"));
});

Route::auth();

Route::get('/home', 'HomeController@index');
