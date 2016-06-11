<?php
namespace App\Http\Controllers;

use App\User;
use App\schulen;
use App\Http\Controllers\Controller;
use DB;
use Request;
class SearchController extends Controller {

    public function search($key) {

        // Sets the parameters from the get request to the variables.
        $userSearch = $key;

        // Perform the query using Query Builder
        $data = DB::table('schulen')
            ->select("*")
            ->join('schulbezeichnung', 'schulbezeichnung.id', '=', 'schulen.fkbezeichnungen')
            ->where('kurzbez', 'LIKE', "%$userSearch%")
            ->get();
        return view('master', compact("data", "zurueck", "weiter", "page"));
        //return $result; //Wenn ihr ein result returned, macht laravel das automatisch zu JSON.
        // BTW JOINT DEM SLACKCHANNEL #schulomat
    }

    public function searchGet(Request $request) {

        // Sets the parameters from the get request to the variables.
        $userSearch = $request::get("searchword");
        // Perform the query using Query Builder
        $data = DB::table('schulen')
            ->select("*")
            ->join('schulbezeichnung', 'schulbezeichnung.id', '=', 'schulen.fkbezeichnungen')
            ->where('kurzbez', 'LIKE', "%$userSearch%")
            ->orWhere('schulbez1', 'LIKE', "%$userSearch%")
            ->orWhere('schulbez2', 'LIKE', "%$userSearch%")
            ->orWhere('schulbez3', 'LIKE', "%$userSearch%")
            ->get();
        return view('master_search', compact("data"));
        //return $result; //Wenn ihr ein result returned, macht laravel das automatisch zu JSON.
        // BTW JOINT DEM SLACKCHANNEL #schulomat
    }

    public function index () {
        return redirect("/schulen/0");
    }
}
?>
