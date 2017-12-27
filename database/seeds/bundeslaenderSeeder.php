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
			"name" => "NRW"
		]);
	}
}
