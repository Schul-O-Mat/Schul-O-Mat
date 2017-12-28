<?php

use Illuminate\Database\Seeder;

class fragenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table("fragen")->truncate();
	    DB::table("fragen")->insert([
		    "name" => "Wie ist der Informatik-Unterricht?"
	    ]);
	    DB::table("fragen")->insert([
		    "name" => "Wie ist die Hygiene?"
	    ]);
	    DB::table("fragen")->insert([
		    "name" => "Wie ist die Mensa?"
	    ]);
	    DB::table("fragen")->insert([
		    "name" => "Wie ist die IT-Ausstattung?"
	    ]);
	    DB::table("fragen")->insert([
		    "name" => "Wie ist die Projektwoche?"
	    ]);
	    DB::table("fragen")->insert([
		    "name" => "Wie sind die Lehrer?"
	    ]);
	    DB::table("fragen")->insert([
		    "name" => "Wie ist die Schulleitung?"
	    ]);
	    DB::table("fragen")->insert([
		    "name" => "Wie ist das Fächerangebot?"
	    ]);
    }
}
