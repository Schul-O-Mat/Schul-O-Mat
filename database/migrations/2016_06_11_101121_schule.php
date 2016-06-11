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
            $table->text("traegernr");
            $table->text("gemeindeschluessel");
            $table->text("schulbetriebsschluessel");
            $table->date("datum"); //Gruendungsdatum
            $table->smallInteger("schuelerzahl");
            $table->smallInteger("lehrerZahl");
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
    }
}
