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
      DB::table("schuladresse")->truncate();
      DB::table("schulbezeichnung")->truncate();
      DB::table("schulkontakt")->truncate();
      DB::table("schulen")->truncate();
      $schuldaten = explode("\n", file_get_contents("https://www.schulministerium.nrw.de/BiPo/OpenData/Schuldaten/schuldaten.csv"));
      foreach($schuldaten as $k => $v){
        $v = str_replace('"', "", $v);
        if($k>1&&$k<count($schuldaten)-1){
          $test = explode(";",$v);

          DB::table("schuladresse")->insert(
            [ "plz" => $test[6],
              "ort" => $test[7],
              "strasse" => $test[8],
              "rw" => $test[18],
              "hw" => $test[19]]
          );
          $id_schulbezeichnung = DB::getPdo()->lastInsertId();
          DB::table("schulbezeichnung")->insert(
            [ "schulbez1" => $test[2],
              "schulbez2" => $test[3],
              "schulbez3" => $test[4],
              "kurzbez"   => $test[5]]
          );
          $id_schulkontakt = DB::getPdo()->lastInsertId();
          DB::table("schulkontakt")->insert(
            [ "homepage" => $test[14],
              "mail" => $test[13],
              "telefonnr" => $test[9]."/".$test[10],
              "faxnr" => $test[11]."/".$test[12]]
          );
          $id_schuladresse = DB::getPdo()->lastInsertId();
          DB::table("schulen")->insert(
            [ "schulnr" => $test[0],
              "schulform" => $test[1],
              "fkkontakt" => $id_schulkontakt,
              "fkadresse" => $id_schuladresse,
              "fkbezeichnungen" => $id_schulbezeichnung,
              "rechtsform" => $test[15],
              "traegernr" => $test[16],
              "gemeindeschluessel" => $test[17],
              "schulbetriebsschluessel" => $test[20],
              "datum" => $test[21],
              "schuelerzahl" => 0,
              "lehrerZahl" => 0]
          );
        }
      }
    }
}
