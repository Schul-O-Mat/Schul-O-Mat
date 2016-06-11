<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
class SearchController extends Controller {

    public function search() {

        // Sets the parameters from the get request to the variables.
        $userSearch = Request::get('searchword');

        // Perform the query using Query Builder
        $result = DB::table('schulen')
            ->select("*")
            ->join('schulbezeichnung', 'schulbezeichnung.id', '=', 'schulen.fkbezeichnungen')
            ->where('kurzbez', 'LIKE', "%$userSearch%")
            ->get();

        return $result;
    }

    public function index () {
        return redirect("/schulen/0");
    }
}
?>
