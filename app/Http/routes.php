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
    return redirect("/schulen/0");
});

Route::get('/schulen/{page}', function ($page) {
    $calc = $page*25;
    $cnt = App\schulen::count();
    $weiter = true;
    $zurueck = ($page==0)? false : true;
    if($calc+25>$cnt)
      $weiter = false;
    $data = App\schulen::take(25)->skip($calc)->get();
    return $cnt;
    return view('master', compact("data", "zurueck", "weiter", "page"));
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

Route::get("/schule/{id}/eintragen", function() {

});

Route::auth();

Route::get('/home', 'HomeController@index');
