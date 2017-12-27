<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Schule extends Migration
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
            $table->integer("schuldetailID");
            $table->integer("bundeslandID");
            $table->integer("schulformID");
            $table->integer("bezeichnung");
            $table->string("bezeichnung_kurz");
            $table->string("schulcode");
            $table->timestamp("schulcode_expire");
            $table->timestamps();
        });

        Schema::create('schuldetails', function (Blueprint $table) {
            $table->increments("id");
            $table->text("strasse");
            $table->integer("plz");
            $table->text("ort");
            $table->text("homepage");
            $table->text("mail");
            $table->text("telnr");
            $table->text("faxnr");
            $table->text("aktivierte_fragen");
            $table->timestamps();
        });
        Schema::create('bewertungen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("userID");
            $table->integer("frageID");
            $table->text("bewertung");
            $table->timestamps();
        });
        Schema::create('keywords', function (Blueprint $table) {
            $table->increments('id');
            $table->text("bezeichnung");
            $table->boolean("changeable")->default(false);
            $table->timestamps();
        });
        Schema::create('key_bew', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("userID");
            $table->integer("keywordID");
            $table->boolean("positiv");
            $table->timestamps();
        });
        Schema::create('bundeslaender', function (Blueprint $table) {
            $table->increments("id");
            $table->text("name");
            $table->timestamps();
        });
        Schema::create('schulformen', function (Blueprint $table) {
            $table->increments("id");
            $table->text("name");
            $table->timestamps();
        });
        Schema::create('fragen', function (Blueprint $table) {
            $table->increments("id");
            $table->text("name");
            $table->timestamps();
        });
        Schema::create('bundeslaender', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("schulID");
            $table->text("text");
            $table->timestamps();
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
        Schema::drop('schulkontakt');
        Schema::drop('schulbezeichnung');
        Schema::drop('schuladresse');
        Schema::drop('bewertungen');
        Schema::drop('keywords');
        Schema::drop('key_bew');
    }
}
