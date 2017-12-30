<?php
namespace App\Http\Controllers;

use App\bewertungen;
use App\fragen;
use App\key_bew;
use App\User;
use App\schulen;
use App\keywords;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Request;

class SchulDetailController extends Controller {

    function detail($schulID){
        try {
            $bewertungda = false;
            if (!Auth::guest()) {
                $bewertungen_count = bewertungen::where('userID', '=', Auth::user()->id)->count();
                $keywords_count = key_bew::where('userID', '=', Auth::user()->id)->count();
                if ($bewertungen_count + $keywords_count > 0) {
                    $bewertungda = true;
                }
            }

            $schule = schulen::findOrFail($schulID);
            $adresse = $schule->details->strasse . " " . $schule->details->plz . " " . $schule->details->ort;

            $cnt = bewertungen::whereHas('user', function ($query) use ($schulID) {
                $query->where('schulID', '=', $schulID);
            })->count();

            if ($cnt > 0){

                //Hole aktivierte Fragen
                $frageIDs = unserialize($schule->details->aktivierte_fragen);
                if (!$frageIDs) {
                    $fragenList = [];
                }
                else {
                    $fragenList = fragen::whereIn('id', $frageIDs)->get();
                }

                //Berechne die Durchschnitte
                $data = [];
                foreach ($fragenList as $frage) {
                    $data[] = ["frage" => $frage, "durchschnitt" => bewertungen::where('frageID', '=', $frage->id)->whereHas('user', function ($query) use ($schulID) {
                        $query->where('schulID', '=', $schulID);
                    })->avg('bewertung')];
                }

                //Ermittle alle Keywords, die der Schule zugeordnet wurden
                $keywordIDs = key_bew::whereHas('user', function ($query) use ($schulID) {
                    $query->where('schulID', '=', $schulID);
                })->with('keyword')->get()->unique('keywordID');


                //Ermittle für jedes Keyword die Anzahl der Vorkommnisse (negativ und positiv)
                $keywords = [];
                foreach ($keywordIDs as $keyword) {
                    $countpos = key_bew::whereHas('user', function ($query) use ($schulID) {
                        $query->where('schulID', '=', $schulID);
                    })->where('keywordID', '=', $keyword->keywordID)->where('positiv', '=', 1)->count();
                    //return $countpos;

                    $countneg = key_bew::whereHas('user', function ($query) use ($schulID) {
                        $query->where('schulID', '=', $schulID);
                    })->where('keywordID', '=', $keyword->keywordID)->where('positiv', '=', 0)->count();

                    $keywords[$keyword->keyword->bezeichnung] = [$countpos, $countneg];
                }

                //Hole alle Freitextbewertungen
                $freitext = bewertungen::where('frageID', '=', 0)->whereHas('user', function ($query) use ($schulID) {
                    $query->where('schulID', '=', $schulID);
                })->get();
            }
            else {
                $data = [];
                $keywords = [];
                $freitext = [];
            }
            return view('detail', compact("schule", "data", "keywords", "freitext", "bewertungda", "adresse"));
        }
        catch(ModelNotFoundException $e){
            return redirect("/");
        }
    }

    function karte($schule){
        $schule = schulen::find($schule);
        $hochwert = $schule->adresse->hw; //hochwert
        $rechtswert = $schule->adresse->rw; //rechtswert
        return view('karten', compact("hochwert", "rechtswert"));
    }

    function fragebogen($id){
        if(Auth::guest() or Auth::user()->type != "student" or Auth::user()->schulID != $id)
            return redirect("/");

        //Finde die Schule anhand der übergebenen ID
        $schule = schulen::findOrFail($id)->with("details")->first();

        //Hole alle für diese Schule aktivierten Fragen aus der DB
        $frageIDs = unserialize($schule->details->aktivierte_fragen);
        if (!$frageIDs) {
            $fragenList = [];
        }
        else {
            $fragenList = fragen::whereIn('id', $frageIDs)->get();
        }

        //Hole alle nicht deaktivierten Keywords
        $keywordIDs = unserialize($schule->details->deaktivierte_keywords);
        if (!$keywordIDs) {
            $keywordIDs = [];
        }
        $keywordList = keywords::whereNotIn('id', $keywordIDs)->get();

        return view("fragebogen", compact("id", "fragenList", "keywordList"));
    }

    function eintragen(Request $request, $id){

        //Hole Benutzerdetails
        $schulID = Auth::user()->schulID;
        $userID = Auth::user()->id;

        //Finde die Schule anhand der übergebenen ID
        $schule = schulen::findOrFail($schulID)->with("details")->first();

        //Hole aktivierte Fragen
        $frageIDs = unserialize($schule->details->aktivierte_fragen);
        if (!$frageIDs) {
            $fragenList = [];
        }
        else {
            $fragenList = fragen::whereIn('id', $frageIDs)->get();
        }

        //Füge Bewertungen für alle Fragen in die DB ein
        foreach ($fragenList as $frage) {
            $bewertung = new bewertungen();
            $bewertung->userID = $userID;
            $bewertung->frageID = $frage->id;
            $bewertung->bewertung = Request::get($frage->id);
            $bewertung->save();
        }

        //Hole die restlichen Felder
        $positiv = Request::get("positive");
        $negativ = Request::get("negative");
        $freitext = Request::get("freitext");

        //Füge Freitext ein
        bewertungen::insert(['userID' => $userID, 'frageID' => 0, 'bewertung' => $freitext]);

        //Füge positive und negative Keywords ein
        foreach ($positiv as $keyword)
        {
            print($keyword);
            //Füge positive Keywords ein
            DB::table('key_bew')->insert(['userID' => $userID, 'keywordID' => $keyword, 'positiv' => '1']);
        }
        foreach ($negativ as $keyword)
        {
            //Füge negative Keywords ein
            DB::table('key_bew')->insert(['userID' => $userID, 'keywordID' => $keyword, 'positiv' => '0']);
        }

        return redirect("/schule/" . $schulID);
    }

    function redaktion($id){
        return view("redaktion", compact("id"));
    }

    function redaktionEintragen(Request $request, $id){
        $toWrite = Request::get("redaktionstext");
        DB::table("redaktion")->insert([
            'schulID' => $id,
            'text' => $toWrite
        ]);
        return $request;
        return view("redaktion", compact("id"));
    }
}
