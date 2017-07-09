<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateBewertungenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bewertungen', function (Blueprint $table) {
        	$table->integer('userID')->unique();
        	$table->primary('userID');
        	$table->integer('schulID');
        	$table->integer('bewertung1');
	        $table->integer('bewertung2');
	        $table->integer('bewertung3');
	        $table->integer('bewertung4');
	        $table->integer('bewertung5');
	        $table->integer('bewertung6');
	        $table->integer('bewertung7');
	        $table->text('freitext');
	        $table->string('positiveaspekte');
	        $table->string('negativeaspekte');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bewertungen');
    }
}
