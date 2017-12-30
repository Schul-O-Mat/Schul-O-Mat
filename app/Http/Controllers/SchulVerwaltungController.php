<?php

namespace App\Http\Controllers;

use App\bundeslaender;
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
}
