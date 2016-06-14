<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KeyTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (!Schema::hasTable('key_rechtsform'))
        Schema::create("key_rechtsform", function (Blueprint $table){
          $table->integer("id");
          $table->primary("id");
          $table->string("rechtsform");
        });
      if (!Schema::hasTable('key_schulbetriebsschluessel'))
        Schema::create("key_schulbetriebsschluessel", function (Blueprint $table){
          $table->integer("id");
          $table->primary("id");
          $table->string("Schulbetrieb");
        });
      if (!Schema::hasTable('key_schulformschluessel'))
        Schema::create("key_schulformschluessel", function (Blueprint $table){
          $table->integer("id");
          $table->primary("id");
          $table->string("Schulform");
        });
      if (!Schema::hasTable('key_traeger'))
        Schema::create("key_traeger", function (Blueprint $table){
          $table->increments("id");
          $table->string("Traegerbezeichnung_1", 41);
          $table->string("Traegerbezeichnung_2", 41);
          $table->string("Traegerbezeichnung_3", 41);
          $table->string("Kurzbezeichnung", 43);
          $table->integer("PLZ");
          $table->string("Ort", 25);
          $table->string("Strasse", 32);
          $table->string("Telefonvorwahl", 5);
          $table->string("Telefon", 10);
          $table->string("Faxvorwahl", 5);
          $table->string("Fax", 10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("key_rechtsform");
        Schema::drop("key_schulbetriebsschluessel");
        Schema::drop("key_schulformschluessel");
        Schema::drop("key_traeger");
    }
}
