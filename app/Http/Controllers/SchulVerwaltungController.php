<?php

namespace App\Http\Controllers;

use App\bundeslaender;
use App\Jobs\CheckSchulcode;
use App\Jobs\CreateSchulcode;
use App\keywords;
use App\schulen;
use App\schulbezeichnung;
use App\schulformen;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class SchulVerwaltungController extends Controller
{
	function index($id){
		$schule = schulen::findOrFail($id);
		$bezeichnung = $schule->bezeichnung_kurz;
		$keywords = keywords::all();
		if(Auth::guest() or Auth::user()->type != "school" or Auth::user()->schulID != $id)
			return redirect("/");
		return view("verwaltung/index", compact("id", "schule", "bezeichnung", "keywords"));
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

		return view("verwaltung/daten", compact("id", "schule", "bezeichnung", "bundeslaender", "schulformen"));

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

    function recreateSchulcode($id) {
	    dispatch(new CreateSchulcode($id));
	    return redirect("/schule/$id/verwaltung");
    }
}
