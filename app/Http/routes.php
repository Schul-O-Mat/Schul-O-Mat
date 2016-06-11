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

Route::get('/schulen/{id}', function ($schule) {
  $schule = App\schulen::find($schule);
  return view('detail', compact("schule"));
});

Route::get('/schulen/{id}/karte', function ($schule) {
  $schule = App\schulen::find($schule);
  $lat = $schule->lat;
  $long = $schule->long;
  return view('karten', compact("schule"));
});

Route::auth();

Route::get('/home', 'HomeController@index');
