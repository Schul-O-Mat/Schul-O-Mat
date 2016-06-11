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
    //return array($weiter, $zurueck);
    return view('master', compact("data", "zurueck", "weiter", "page"));
});


Route::get('/schule/{id}', function ($schule) {
  $schule = App\schulen::find($schule);
  $hochwert = $schule->adresse->lat; //hochwert
  $rechtswert = $schule->adresse->lon; //rechtswert
    $schueler = $schule->schueler;
    $durchschnitt = array();
    $durchschnitt[0] = DB::table('bewertungen')->select(DB::raw('AVG(bewertung1) as b1'))->first()->b1;
    $durchschnitt[1] = DB::table('bewertungen')->select(DB::raw('AVG(bewertung2) as b2'))->first()->b2;
    $durchschnitt[2] = DB::table('bewertungen')->select(DB::raw('AVG(bewertung3) as b3'))->first()->b3;
    $durchschnitt[3] = DB::table('bewertungen')->select(DB::raw('AVG(bewertung4) as b4'))->first()->b4;
    $durchschnitt[4] = DB::table('bewertungen')->select(DB::raw('AVG(bewertung5) as b5'))->first()->b5;
    $durchschnitt[5] = DB::table('bewertungen')->select(DB::raw('AVG(bewertung6) as b6'))->first()->b6;
    $durchschnitt[6] = DB::table('bewertungen')->select(DB::raw('AVG(bewertung7) as b7'))->first()->b7;
  return view('detail', compact("schule", "hochwert", "rechtswert", "durchschnitt"));
});

Route::get('/schule/{id}/karte', function ($schule) {
  $schule = App\schulen::find($schule);
  $hochwert = $schule->adresse->lat; //hochwert
  $rechtswert = $schule->adresse->lon; //rechtswert
  return view('karten', compact("hochwert", "rechtswert"));
});

Route::get("/schule/{id}/eintragen", function() {
  return view("fragebogen");
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/schule/{id}/redaktion', function($schule) {
    return view("redaktion")
})
