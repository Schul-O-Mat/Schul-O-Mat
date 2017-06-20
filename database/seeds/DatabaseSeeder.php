<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(schulbetriebsschluessel::class);
        $this->call(schulenseeder::class);
        $this->call(schulformen::class);
	    $this->call(schulkeywords::class);
        $this->call(schulrechtsform::class);
        $this->call(schultraeger::class);
    }
}
