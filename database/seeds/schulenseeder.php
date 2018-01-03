<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\schulformen;

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
        $schulformen = [
            2 => schulformen::where('name', 'LIKE', 'Grundschule')->first()->id,
            4 => schulformen::where('name', 'LIKE', 'Hauptschule')->first()->id,
            8 => schulformen::where('name', 'LIKE', 'Förderschule')->first()->id,
            10 => schulformen::where('name', 'LIKE', 'Realschule')->first()->id,
            15 => schulformen::where('name', 'LIKE', 'Gesamtschule')->first()->id,
            17 => schulformen::where('name', 'LIKE', 'Waldorfschule')->first()->id,
            20 => schulformen::where('name', 'LIKE', 'Gymnasium')->first()->id,
            30 => schulformen::where('name', 'LIKE', 'Berufskolleg')->first()->id
        ];
        $schulform_sonst = schulformen::where('name', 'sonstige Schulform')->first()->id;
        $schuldaten = explode("\n", file_get_contents("https://www.schulministerium.nrw.de/BiPo/OpenData/Schuldaten/schuldaten.csv"));
        foreach($schuldaten as $k => $v){
            $v = str_replace('"', "", $v);
            if($k>1&&$k<count($schuldaten)-1){
                $parsedData = explode(";",$v);
                \App\schuldetails::create(
                    [ "plz" => $parsedData[6],
                        "ort" => $parsedData[7],
                        "strasse" => $parsedData[8],
                        "homepage" => $parsedData[14],
                        "mail" => $parsedData[13],
                        "telnr" => $parsedData[9]."/".$parsedData[10],
                        "faxnr" => $parsedData[11]."/".$parsedData[12],
                        "aktivierte_fragen" => serialize(\App\fragen::all()->pluck('id')->toArray())
                    ]
                );
                $id_schuldetails = DB::getPdo()->lastInsertId();
                if (in_array($parsedData[1], array_keys($schulformen))) {
                    $schulformID = $schulformen[(int) $parsedData[1]];
                }
                else {
                    $schulformID = $schulform_sonst;
                }
                \App\schulen::create(
                    [
                        "bundeslandID" => 5,
                        "schuldetailID" => $id_schuldetails,
                        "schulformId" => $schulformID,
                        "bezeichnung" => $parsedData[2] ." ". $parsedData[3] ." ". $parsedData[4],
                        "bezeichnung_kurz" => $parsedData[5],
                        "schulcode" => str_random(8),
                        "schulcode_expire" => Carbon::now()->addMonths(2)
                    ]
                );
            }
        }
    }
}
