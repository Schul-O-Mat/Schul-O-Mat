<?php
namespace App\Http\Controllers;

use App\User;
use App\schulen;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

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
        DB::enableQueryLog();
        $data = DB::table('schulen')
            ->select("*")
            ->join('schulbezeichnung', 'schulbezeichnung.id', '=', 'schulen.fkbezeichnungen')
            ->join('schuladresse', 'schuladresse.id', '=', 'schulen.fkadresse')
            ->join('key_schulbetriebsschluessel', 'key_schulbetriebsschluessel.id', '=', 'schulen.schulbetriebsschluessel')
            ->join('key_rechtsform', 'key_rechtsform.id', '=', 'schulen.rechtsform')
            ->join('key_schulformschluessel', 'key_schulformschluessel.id', '=', 'schulen.schulform');
        if ($request->has("ort"))
            $data->where("schuladresse.ort", "=", $request->request->all()["ort"]);
        if ($request->has("schulart"))
            foreach ($request->request->all()["schulart"] as $d)
                $data->where("schulen.schulform", "=", $d);
        if ($request->has("schulform"))
            foreach ($request->request->all()["schulform"] as $d)
                $data->where("schulen.schulform", "=", $d);
        $data->where("schulen.schulbetriebsschluessel", "=", 1);
        $data = $data->get();
        //dd($request);
        dd(DB::getQueryLog());
        return view("master_search", compact("data"));
    }

}
