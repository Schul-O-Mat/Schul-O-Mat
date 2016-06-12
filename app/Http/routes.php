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

Route::get('/schulen/search', 'SearchController@searchGet'); //die reihenfolge ist wichtig #schulomat in slack
//Route::get('/schulen/search/{key}', 'SearchController@search'); //die reihenfolge ist wichtig #schulomat in slack

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
  $schulID = $schule;
    $schule = App\schulen::find($schule);
  $hochwert = $schule->adresse->lat; //hochwert
  $rechtswert = $schule->adresse->lon; //rechtswert
    $schueler = $schule->schueler;
    $durchschnitt = array();
    $durchschnitt[0] = DB::table('bewertungen')->join('users', 'bewertungen.userID', '=', 'users.id')->select(DB::raw('AVG(bewertung1) as b1'))->where('users.schulID', '=', $schulID)->first()->b1;
    $durchschnitt[1] = DB::table('bewertungen')->join('users', 'bewertungen.userID', '=', 'users.id')->select(DB::raw('AVG(bewertung2) as b2'))->where('users.schulID', '=', $schulID)->first()->b2;
    $durchschnitt[2] = DB::table('bewertungen')->join('users', 'bewertungen.userID', '=', 'users.id')->select(DB::raw('AVG(bewertung3) as b3'))->where('users.schulID', '=', $schulID)->first()->b3;
    $durchschnitt[3] = DB::table('bewertungen')->join('users', 'bewertungen.userID', '=', 'users.id')->select(DB::raw('AVG(bewertung4) as b4'))->where('users.schulID', '=', $schulID)->first()->b4;
    $durchschnitt[4] = DB::table('bewertungen')->join('users', 'bewertungen.userID', '=', 'users.id')->select(DB::raw('AVG(bewertung5) as b5'))->where('users.schulID', '=', $schulID)->first()->b5;
    $durchschnitt[5] = DB::table('bewertungen')->join('users', 'bewertungen.userID', '=', 'users.id')->select(DB::raw('AVG(bewertung6) as b6'))->where('users.schulID', '=', $schulID)->first()->b6;
    $durchschnitt[6] = DB::table('bewertungen')->join('users', 'bewertungen.userID', '=', 'users.id')->select(DB::raw('AVG(bewertung7) as b7'))->where('users.schulID', '=', $schulID)->first()->b7;

    $posi = DB::table('bewertungen')->join('users', 'bewertungen.userID', '=', 'users.id')->join('key_bew', 'bewertungen.id', '=', 'key_bew.bewertungID')->join('keywords', 'key_bew.keywordID', '=', 'keywords.id')->select('keywords.bezeichnung')->where('users.schulID', '=', $schulID)->get();
    $keywords = array();
    foreach ($posi as $p)
    {
        $countpos = DB::table('bewertungen')->join('users', 'bewertungen.userID', '=', 'users.id')->join('key_bew', 'bewertungen.id', '=', 'key_bew.bewertungID')->join('keywords', 'key_bew.keywordID', '=', 'keywords.id')->select(DB::raw('COUNT(key_bew.keywordID) as pos'))->where('users.schulID', '=', $schulID)->where('keywords.bezeichnung', '=', $p->bezeichnung)->where('key_bew.positiv', '=', '1')->first()->pos;
        $countneg = DB::table('bewertungen')->join('users', 'bewertungen.userID', '=', 'users.id')->join('key_bew', 'bewertungen.id', '=', 'key_bew.bewertungID')->join('keywords', 'key_bew.keywordID', '=', 'keywords.id')->select(DB::raw('COUNT(key_bew.keywordID) as neg'))->where('users.schulID', '=', $schulID)->where('keywords.bezeichnung', '=', $p->bezeichnung)->where('key_bew.positiv', '=', '0')->first()->neg;
        $keywords[$p->bezeichnung] = [$countpos, $countneg];
    }

    $reviews = DB::table('bewertungen')->join('users', 'bewertungen.userID', '=', 'users.id')->select('freitext')->where('users.schulID', '=', $schulID)->get();
  return view('detail', compact("schule", "hochwert", "rechtswert", "durchschnitt", "keywords", "reviews"));
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

Route::post("/schule/{id}/eintragen/writedata)", function(Request $request, $id) {
    $question1 = Request::get("schoolgeneral");
    $question2 = Request::get("mensa");
    $question3 = Request::get("ag");
    $question4 = Request::get("ausstattung");
    $question5 = Request::get("toilet");
    $question6 = Request::get("length");
    $question7 = Request::get("time");
    DB::table("bewertung")->insert([
        ''
    ]);
})

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/schule/{id}/redaktion', function($id) {
    return view("redaktion", compact("id"));
});

Route::post("schule/{id}/redaktion/writedata", function(Request $request, $id) {
    $toWrite = Request::get("redaktionstext");
    DB::table("redaktion")->insert([
        'schulID' => $id,
        'text' => $toWrite
    ]);
    return view("redaktion", compact("id"));
});
