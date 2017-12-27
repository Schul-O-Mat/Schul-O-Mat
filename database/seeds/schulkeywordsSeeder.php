<?php

use Illuminate\Database\Seeder;

class schulkeywordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
		DB::table("keywords")->truncate();
		DB::table("keywords")->insert([
			"bezeichnung" => "Informatik-Unterricht"
		]);
		DB::table("keywords")->insert([
			"bezeichnung" => "Hygiene"
		]);
		DB::table("keywords")->insert([
			"bezeichnung" => "Mensa",
			"changeable" => true
		]);
		DB::table("keywords")->insert([
			"bezeichnung" => "IT-Ausstattung"
		]);
		DB::table("keywords")->insert([
			"bezeichnung" => "Projektwoche"
		]);
		DB::table("keywords")->insert([
			"bezeichnung" => "Lehrer"
		]);
		DB::table("keywords")->insert([
			"bezeichnung" => "Schulleitung"
		]);
		DB::table("keywords")->insert([
			"bezeichnung" => "Fächerangebot"
		]);
	}
}
