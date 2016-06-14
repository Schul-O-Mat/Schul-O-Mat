<?php

use Illuminate\Database\Seeder;

class schultraeger extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         DB::table("key_traeger")->truncate();
         $schuldaten = explode("\n", file_get_contents("https://www.schulministerium.nrw.de/BiPo/OpenData/Schuldaten/key_traeger.csv"));
         foreach($schuldaten as $k => $v){
           $v = str_replace('"', "", $v);
           if($k>1&&$k<count($schuldaten)-1){
             $v = explode(";", $v);
             DB::table("key_traeger")->insert([
               "id" => $v[0],
               "Traegerbezeichnung_1" => $v[1],
               "Traegerbezeichnung_2" => $v[2],
               "Traegerbezeichnung_3" => $v[3],
               "Kurzbezeichnung" => $v[4],
               "PLZ" => $v[5],
               "Ort" => $v[6],
               "Strasse" => $v[7],
               "Telefonvorwahl" => $v[8],
               "Telefon" => $v[9],
               "Faxvorwahl" => $v[10],
               "Fax" => $v[11]
             ]);
           }
         }
     }
}
