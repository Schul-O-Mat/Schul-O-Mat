<?php

namespace App\Http\Controllers;

use App\keywords;
use App\schulen;
use App\schulbezeichnung;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class SchulVerwaltungController extends Controller
{
	function index($id){
		$schule = schulen::findOrFail($id);
		$bezeichnung = schulbezeichnung::findOrFail($schule->fkbezeichnungen)->kurzbez;
		$keywords = keywords::all();
		if(Auth::guest() or Auth::user()->type != "school" or Auth::user()->schulID != $id)
			return redirect("/");
		return view("verwaltung/index", compact("id", "schule", "bezeichnung", "keywords"));
	}
}
