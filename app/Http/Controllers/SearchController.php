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
        $zurueck = false;
        $weiter = false;
        $page = 0;
        // Perform the query using Query Builder
        $data = schulen::with(array("bezeichnung" => function($query){
          $collection->where(DB::raw('bookname like %'.$element.'%'));
          $query->where("schulbezeichnung.kurzbez like %".$userSearch.%");

        }))->get();

        /*
        $deliveries = Delivery::with(array('order' => function($query)
        {
             $query->where('orders.user_id', $customerID);
             $query->orderBy('orders.created_at', 'DESC');
        }))
            ->orderBy('date')
            ->get();
        */
        /*$data = DB::table('schulen')
            ->select("*")
            ->join('schulbezeichnung', 'schulbezeichnung.id', '=', 'schulen.fkbezeichnungen')
            ->where('kurzbez', 'LIKE', "%$userSearch%")
            ->get();*/
        return view('master', compact("data", "zurueck", "weiter", "page"));
        //return $result; //Wenn ihr ein result returned, macht laravel das automatisch zu JSON.
        // BTW JOINT DEM SLACKCHANNEL #schulomat
    }

    public function index () {
        return redirect("/schulen/0");
    }
}
?>
