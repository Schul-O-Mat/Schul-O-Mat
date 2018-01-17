<?php

namespace App\Http\Controllers;

use App\schulen;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{
	public function schulenSearchOrt(Request $request) {
		$ort = $request->get("ort");
		$data = schulen::whereHas("details", function($query) use($ort) {
			$query->where('ort', '=', $ort);
		})->get();
		$schulen = new \stdClass();
		foreach($data as $schule)
		{
			$bezeichnung           = $schule->bezeichnung . " (ID:" . $schule->id . ")";
			$schulen->$bezeichnung = "";

		}
		return response()->json($schulen);
	}
}
