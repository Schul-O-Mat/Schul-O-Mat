<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
	        $table->integer('schulID');
			$table->string('email')->unique();
			$table->string('pasword');
			$table->string('vorname');
	        $table->string('nachname');
	        $table->date('gebdatum');
	        $table->integer('stufe');
	        $table->string('remember_token');
	        $table->string('typ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
