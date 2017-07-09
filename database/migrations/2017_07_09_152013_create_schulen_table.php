<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateSchulenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schulen', function (Blueprint $table) {
        	$table->increments('id');
	        $table->integer('schulnr');
        	$table->integer('bundeslandID');
	        $table->integer('schulformID');
	        $table->string('bezeichnung');
	        $table->string('bezeichnung_kurz');
	        $table->string('strasse');
	        $table->integer('plz');
	        $table->string('ort');
	        $table->string('homepage');
	        $table->string('mail');
	        $table->string('telefon');
	        $table->string('fax');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('schulen');
    }
}
