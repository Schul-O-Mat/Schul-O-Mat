<?php

use Illuminate\Database\Seeder;

class schulrechtsform extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         DB::table("key_rechtsform")->truncate();
         $schuldaten = explode("\n", file_get_contents("https://www.schulministerium.nrw.de/BiPo/OpenData/Schuldaten/key_rechtsform.csv"));
         foreach($schuldaten as $k => $v){
           $v = str_replace('"', "", $v);
           if($k>1&&$k<count($schuldaten)-1){
             $v = explode(";", $v);
             DB::table("key_rechtsform")->insert([
               "id" => $v[0],
               "rechtsform" => $v[1]
             ]);
           }
         }
     }
}
