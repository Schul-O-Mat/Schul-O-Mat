<?php

use Illuminate\Database\Seeder;

class schulformen extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         DB::table("key_schulformschluessel")->truncate();
         $schuldaten = explode("\n", file_get_contents("https://www.schulministerium.nrw.de/BiPo/OpenData/Schuldaten/key_schulformschluessel.csv"));
         foreach($schuldaten as $k => $v){
           $v = str_replace('"', "", $v);
           if($k>1&&$k<count($schuldaten)-1){
             $v = explode(";", $v);
             DB::table("key_schulformschluessel")->insert([
               "id" => $v[0],
               "Schulform" => $v[1]
             ]);
           }
         }
     }
}
