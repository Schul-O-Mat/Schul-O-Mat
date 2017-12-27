<?php

use Illuminate\Database\Seeder;

class bundeslaenderSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table("bundeslaender")->truncate();
		DB::table("bundeslaender")->insert([
			"name" => "Schleswig-Holstein"
		]);
		DB::table("bundeslaender")->insert([
			"name" => "Freie und Hansestadt Hamburg"
		]);
		DB::table("bundeslaender")->insert([
			"name" => "	Niedersachsen"
		]);
		DB::table("bundeslaender")->insert([
			"name" => "Freie Hansestadt Bremen"
		]);
		DB::table("bundeslaender")->insert([
			"name" => "Nordrhein-Westfalen"
		]);
		DB::table("bundeslaender")->insert([
			"name" => "Hessen"
		]);
		DB::table("bundeslaender")->insert([
			"name" => "Rheinland-Pfalz"
		]);
		DB::table("bundeslaender")->insert([
			"name" => "Baden-Württemberg"
		]);
		DB::table("bundeslaender")->insert([
			"name" => "Freistaat Bayern"
		]);
		DB::table("bundeslaender")->insert([
			"name" => "Saarland"
		]);
		DB::table("bundeslaender")->insert([
			"name" => "Berlin"
		]);
		DB::table("bundeslaender")->insert([
			"name" => "Brandenburg"
		]);
		DB::table("bundeslaender")->insert([
			"name" => "Mecklenburg-Vorpommern"
		]);
		DB::table("bundeslaender")->insert([
			"name" => "Freistaat Sachsen"
		]);
		DB::table("bundeslaender")->insert([
			"name" => "Sachsen-Anhalt"
		]);
		DB::table("bundeslaender")->insert([
			"name" => "Freistaat Thüringen"
		]);
	}
}
