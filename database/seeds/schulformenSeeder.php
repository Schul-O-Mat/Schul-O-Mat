<?php

use Illuminate\Database\Seeder;
use App\schulformen;

class schulformenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schulformen')->truncate();

        schulformen::create(['name' => 'Grundschule']);
        schulformen::create(['name' => 'Hauptschule']);
        schulformen::create(['name' => 'Förderschule']);
        schulformen::create(['name' => 'Realschule']);
        schulformen::create(['name' => 'Gesamtschule']);
        schulformen::create(['name' => 'Waldorfschule']);
        schulformen::create(['name' => 'Gymnasium']);
        schulformen::create(['name' => 'Berufskolleg']);
        schulformen::create(['name' => 'sonstige Schulform']);

    }
}
