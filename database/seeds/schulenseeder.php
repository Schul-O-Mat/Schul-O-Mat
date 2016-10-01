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
          $rw = parseFloat(rw);
          $hw = parseFloat(hw);

          $a = 6377397.155;
          $f = 0.00334277321;
          $pi = get($Math, "PI");
          $c = _divide($a, (1.0 - to_number($f)));
          $ex2 = _divide(((2.0 * to_number($f)) - (to_number($f) * to_number($f))), ((1.0 - to_number($f)) * (1.0 - to_number($f))));
          $ex4 = to_number($ex2) * to_number($ex2);
          $ex6 = to_number($ex4) * to_number($ex2);
          $ex8 = to_number($ex4) * to_number($ex4);
          $e0 = (to_number($c) * _divide($pi, 180.0)) * to_number(_plus((to_number(_plus((1.0 - _divide((3.0 * to_number($ex2)), 4.0)), _divide((45.0 * to_number($ex4)), 64.0))) - _divide((175.0 * to_number($ex6)), 256.0)), _divide((11025.0 * to_number($ex8)), 16384.0)));
          $f2 = _divide(180.0, $pi) * (to_number(_plus((_divide((3.0 * to_number($ex2)), 8.0) - _divide((3.0 * to_number($ex4)), 16.0)), _divide((213.0 * to_number($ex6)), 2048.0))) - _divide((255.0 * to_number($ex8)), 4096.0));
          $f4 = _divide(180.0, $pi) * to_number(_plus((_divide((21.0 * to_number($ex4)), 256.0) - _divide((21.0 * to_number($ex6)), 256.0)), _divide((533.0 * to_number($ex8)), 8192.0)));
          $f6 = _divide(180.0, $pi) * (_divide((151.0 * to_number($ex6)), 6144.0) - _divide((453.0 * to_number($ex8)), 12288.0));
          $sigma = _divide($hw, $e0);
          $sigmr = _divide((to_number($sigma) * to_number($pi)), 180.0);
          $bf = _plus($sigma, (to_number($f2) * to_number(call_method($Math, "sin", 2.0 * to_number($sigmr)))), (to_number($f4) * to_number(call_method($Math, "sin", 4.0 * to_number($sigmr)))), (to_number($f6) * to_number(call_method($Math, "sin", 6.0 * to_number($sigmr)))));
          $br = _divide((to_number($bf) * to_number($pi)), 180.0);
          $tan1 = call_method($Math, "tan", $br);
          $tan2 = to_number($tan1) * to_number($tan1);
          $tan4 = to_number($tan2) * to_number($tan2);
          $cos1 = call_method($Math, "cos", $br);
          $cos2 = to_number($cos1) * to_number($cos1);
          $etasq = to_number($ex2) * to_number($cos2);
          $nd = _divide($c, call_method($Math, "sqrt", _plus(1.0, $etasq)));
          $nd2 = to_number($nd) * to_number($nd);
          $nd4 = to_number($nd2) * to_number($nd2);
          $nd6 = to_number($nd4) * to_number($nd2);
          $nd3 = to_number($nd2) * to_number($nd);
          $nd5 = to_number($nd4) * to_number($nd);
          $kz = call($parseInt, _divide($rw, 1000000.0));
          $lh = to_number($kz) * 3.0;
          $dy = to_number($rw) - to_number(_plus((to_number($kz) * 1000000.0), 500000.0));
          $dy2 = to_number($dy) * to_number($dy);
          $dy4 = to_number($dy2) * to_number($dy2);
          $dy3 = to_number($dy2) * to_number($dy);
          $dy5 = to_number($dy4) * to_number($dy);
          $dy6 = to_number($dy3) * to_number($dy3);
          $b2 = _divide((_negate($tan1) * to_number(_plus(1.0, $etasq))), (2.0 * to_number($nd2)));
          $b4 = _divide((to_number($tan1) * to_number(_plus(5.0, (3.0 * to_number($tan2)), ((6.0 * to_number($etasq)) * (1.0 - to_number($tan2)))))), (24.0 * to_number($nd4)));
          $b6 = _divide((_negate($tan1) * to_number(_plus(61.0, (90.0 * to_number($tan2)), (45.0 * to_number($tan4))))), (720.0 * to_number($nd6)));
          $l1 = _divide(1.0, (to_number($nd) * to_number($cos1)));
          $l3 = _divide(_negate(_plus(1.0, (2.0 * to_number($tan2)), $etasq)), ((6.0 * to_number($nd3)) * to_number($cos1)));
          $l5 = _divide(_plus(5.0, (28.0 * to_number($tan2)), (24.0 * to_number($tan4))), ((120.0 * to_number($nd5)) * to_number($cos1)));
          $bp = _plus($bf, (_divide(180.0, $pi) * to_number(_plus((to_number($b2) * to_number($dy2)), (to_number($b4) * to_number($dy4)), (to_number($b6) * to_number($dy6))))));
          $lp = _plus($lh, (_divide(180.0, $pi) * to_number(_plus((to_number($l1) * to_number($dy)), (to_number($l3) * to_number($dy3)), (to_number($l5) * to_number($dy5))))));
          if ($lp < 5.0 || $lp > 16.0 || $bp < 46.0 || $bp > 56.0) {
            echo "Error";
          }

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
