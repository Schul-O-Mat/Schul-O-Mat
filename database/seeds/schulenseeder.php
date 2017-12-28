<?php

use Illuminate\Database\Seeder;

class schulenseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table("schuldetails")->truncate();
      DB::table("schulen")->truncate();
      $schuldaten = explode("\n", file_get_contents("https://www.schulministerium.nrw.de/BiPo/OpenData/Schuldaten/schuldaten.csv"));
      foreach($schuldaten as $k => $v){
        $v = str_replace('"', "", $v);
        if($k>1&&$k<count($schuldaten)-1){
          $parsedData = explode(";",$v);
          DB::table("schuldetails")->insert(
            [ "plz" => $parsedData[6],
              "ort" => $parsedData[7],
              "strasse" => $parsedData[8],
              "homepage" => $parsedData[14],
              "mail" => $parsedData[13],
              "telnr" => $parsedData[9]."/".$parsedData[10],
              "faxnr" => $parsedData[11]."/".$parsedData[12]
	        ]
          );
          $id_schuldetails = DB::getPdo()->lastInsertId();
          DB::table("schulen")->insert(
            [
              "bundeslandID" => 5,
              "schuldetailID" => $id_schuldetails,
              "schulformId" => $parsedData[1],
              "bezeichnung" => $parsedData[2] ." ". $parsedData[3] ." ". $parsedData[4],
              "bezeichnung_kurz" => $parsedData[5]
            ]
          );
        }
      }
    }
}
