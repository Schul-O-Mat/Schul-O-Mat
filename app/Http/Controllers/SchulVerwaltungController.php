<?php

namespace App\Http\Controllers;

use App\bewertungen;
use App\bundeslaender;
use App\fragen;
use App\Jobs\CheckSchulcode;
use App\Jobs\CreateSchulcode;
use App\keywords;
use App\schulen;
use App\schulbezeichnung;
use App\schulformen;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class SchulVerwaltungController extends Controller
{
	function index($id){
		$schule = schulen::findOrFail($id);
		$bezeichnung = $schule->bezeichnung_kurz;
		$keywords = keywords::all();
		$schulcode = $schule->schulcode;
		$fragen = fragen::all();
		if(Auth::guest() or Auth::user()->type != "school" or Auth::user()->schulID != $id)
			return redirect("/");
		return view("schulVerwaltung/index", compact("id", "schule", "bezeichnung", "keywords", "schulcode", "fragen"));
	}
	function daten($id){
        if(Auth::guest() or Auth::user()->type != "school" or Auth::user()->schulID != $id)
            return redirect("/");

		$schule = schulen::whereIn('id', [$id])->with('details')->first();
		$bezeichnung = $schule->bezeichnung_kurz;

		//Bundesländer holen
        $bundeslaender = bundeslaender::all();

        //Schulformen holen
        $schulformen = schulformen::all();

		return view("schulVerwaltung/daten", compact("id", "schule", "bezeichnung", "bundeslaender", "schulformen"));

	}

	function datenAendern(Request $request, $id) {

	    if (Auth::user()->schulID == $id && Auth::user()->type == "school") {

	        $schule = schulen::findOrFail($id);

	        $schule->bundeslandID = $request->input('bundesland');
            $schule->schulformID = $request->input('schulform');
            $schule->bezeichnung = $request->input('bezeichnung');
            $schule->bezeichnung_kurz = $request->input('kurzbezeichnung');
            $schule->save();

            $details = $schule->details()->first();
            $details->strasse = $request->input('strasse');
            $details->ort = $request->input('ort');
            $details->plz = $request->input('plz');
            $details->homepage = $request->input('homepage');
            $details->mail = $request->input('mail');
            $details->telnr = $request->input('telnr');
            $details->faxnr = $request->input('faxnr');
            $details->save();

        }

        return redirect("/schule/$id/verwaltung/");
    }

    function einzelberichtMelden($id, $berichtId) {
		if (Auth::user()->type == 'school' && Auth::user()->schulID == $id && Auth::user()->schulID === User::findOrFail(bewertungen::findOrFail($berichtId)->userID)->schulID) {
			$schule = schulen::findOrFail($id);
			$bericht = bewertungen::findOrFail($berichtId);
			return view("schulVerwaltung.einzelbericht_melden", compact("id", "berichtId", "schule", "bericht"));
		} else {
			return redirect("/schule/$id");
		}
    }

    function recreateSchulcode($id) {
	    dispatch(new CreateSchulcode($id));
	    return redirect("/schule/$id/verwaltung?action=schulcode");
    }
}
