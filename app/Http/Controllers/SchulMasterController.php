<?php
namespace App\Http\Controllers;

use App\User;
use App\schulen;
use App\Http\Controllers\Controller;
use DB;
use Request;
class SchulMasterController extends Controller {

  function redirect(){
    return redirect("/schulen/0");
  }

  function pagination( $page ) {
      $calc = $page*25;
      $cnt = schulen::count();
      $weiter = true;
      $zurueck = ($page==0)? false : true;
      if($calc+25>$cnt)
        $weiter = false;
      $data = schulen::take(25)->skip($calc)->get();
      //return array($weiter, $zurueck);
      return view('master', compact("data", "zurueck", "weiter", "page"));
  }

}
