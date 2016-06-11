<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use DB;
class SearchController extends Controller {

    public function search($key) {

        // Sets the parameters from the get request to the variables.
        $userSearch = $key;

        // Perform the query using Query Builder
        $result = DB::table('schulen')
            ->select("*")
            ->join('schulbezeichnung', 'schulbezeichnung.id', '=', 'schulen.fkbezeichnungen')
            ->where('kurzbez', 'LIKE', "%$userSearch%")
            ->get();
        return $result; //Wenn ihr ein result returned, macht laravel das automatisch zu JSON.
        // BTW JOINT DEM SLACKCHANNEL #schulomat
    }

    public function searchGet(Request $request) {

        // Sets the parameters from the get request to the variables.
        $userSearch = $request->get("searchword");

        // Perform the query using Query Builder
        $result = DB::table('schulen')
            ->select("*")
            ->join('schulbezeichnung', 'schulbezeichnung.id', '=', 'schulen.fkbezeichnungen')
            ->where('kurzbez', 'LIKE', "%$userSearch%")
            ->get();
        return $result; //Wenn ihr ein result returned, macht laravel das automatisch zu JSON.
        // BTW JOINT DEM SLACKCHANNEL #schulomat
    }

    public function index () {
        return redirect("/schulen/0");
    }
}
?>
