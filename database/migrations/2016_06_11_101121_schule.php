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
            $table->increments('schulnr');
            $table->integer("schulform");
            $table->integer("fkkontakt");
            $table->integer("fkadresse");
            $table->integer("fkbezeichnungen");
            $table->integer("rechtsform");
            $table->integer("traegernr");
            $table->text("gemeindeschluessel");
            $table->integer("schulbetriebsschluessel");
            $table->date("datum"); //Gruendungsdatum
            $table->smallInteger("schuelerzahl");
            $table->smallInteger("lehrerZahl");
            $table->timestamps();
        });

        Schema::create('schulkontakt', function (Blueprint $table) {
            $table->increments('id');
            $table->text("homepage");
            $table->text("mail");
            $table->text("telefonnr");
            $table->text("faxnr");
            $table->timestamps();
        });
        Schema::create('schulbezeichnung', function (Blueprint $table) {
            $table->increments('id');
            $table->text("schulbez1");
            $table->text("schulbez2");
            $table->text("schulbez3");
            $table->text("kurzbez");
            $table->timestamps();
        });
        Schema::create('schuladresse', function (Blueprint $table) {
            $table->increments('id');
            $table->text("plz");
            $table->text("ort");
            $table->text("strasse");
            $table->integer("lat");
            $table->integer("lon");
            $table->timestamps();
        });
        Schema::create('bewertungen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("userID");
            $table->tinyInteger("bewertung1");
            $table->tinyInteger("bewertung2");
            $table->tinyInteger("bewertung3");
            $table->tinyInteger("bewertung4");
            $table->tinyInteger("bewertung5");
            $table->tinyInteger("bewertung6");
            $table->tinyInteger("bewertung7");
            $table->text("freitext");
            $table->timestamps();
        });
        Schema::create('keywords', function (Blueprint $table) {
            $table->increments('id');
            $table->text("bezeichnung");
            $table->timestamps();
        });
        Schema::create('key_bew', function (Blueprint $table) {
            $table->integer("bewertungID");
            $table->integer("keywordID");
            $table->boolean("positiv");
            $table->timestamps();
            $table->index(["bewertungID", "keywordID"]);
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
