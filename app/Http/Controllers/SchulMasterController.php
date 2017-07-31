<?php
namespace App\Http\Controllers;

use App\User;
use App\schulen;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Auth;

class SchulMasterController extends Controller
{

    function redirect()
    {
        return redirect("/schulen/0");
    }

    function pagination($page)
    {
        $calc = $page * 25;
        $cnt = schulen::count();
        $weiter = true;
        $zurueck = ($page == 0) ? false : true;
        if ($calc + 25 > $cnt)
            $weiter = false;
        $data = schulen::take(25)->skip($calc)->get();
        $schulform = DB::table("key_schulformschluessel")->get();
        $schulzustand = DB::table("key_schulbetriebsschluessel")->get();
        $staedte = DB::table("schuladresse")->select("ort")->groupBy("ort")->get();
        return view('master', compact("data", "zurueck", "weiter", "page", "schulform", "schulzustand", "staedte"));
    }

    function paginationFilter(Request $request)
    {
    	$page = $request->get('page');
	    $calc = $page * 25;
        $data = DB::table('schulen')
            ->select("*")
            ->join('schulbezeichnung', 'schulbezeichnung.id', '=', 'schulen.fkbezeichnungen')
            ->join('schuladresse', 'schuladresse.id', '=', 'schulen.fkadresse')
            ->join('key_schulbetriebsschluessel', 'key_schulbetriebsschluessel.id', '=', 'schulen.schulbetriebsschluessel')
            ->join('key_rechtsform', 'key_rechtsform.id', '=', 'schulen.rechtsform')
            ->join('key_schulformschluessel', 'key_schulformschluessel.id', '=', 'schulen.schulform');
	    $ort = $request->get("ort");
	    $schulart = $request->get("schulart");
	    $schulform = $request->get("schulform");
        if ($request->has("ort"))
            $data->where("schuladresse.ort", "=", $ort);
        if ($request->has("schulart"))
            $data->whereIn("schulen.rechtsform", $schulart);
        if ($request->has("schulform"))
            $data->whereIn("schulen.schulform", $schulform);
        $data->where("schulen.schulbetriebsschluessel", "=", 1);
	    $cnt = $data->count();
        $data = $data->take(25)->skip($calc)->get();
	    $weiter = true;
	    $zurueck = ($page == 0) ? false : true;
	    if ($calc + 25 > $cnt)
		    $weiter = false;
        return view("master_filter", compact("data", "zurueck", "weiter", "page", "ort", "schulart", "schulform"));
    }

    function newKeyword() {
        if(Auth::guest())
            return redirect("/");

        return view("newkeyword");
    }

    function newKeywordEintragen(Request $request){
//        $userID = Auth::user()->id;
        //Hole Eingaben von allen Eingabefeldern
        $bezeichnung = $request->get("bezeichnung");
            //Füge positive Keywords ein
            DB::table('keywords')->insert(['bezeichnung' => $bezeichnung]);

        return redirect("/schule/");
    }
}
