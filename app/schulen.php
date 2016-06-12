<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schulen extends Model
{
    protected $table = "schulen";
    protected $primaryKey = "schulnr";

    public function kontakt()
    {
        return $this->hasOne('App\schulkontakt', "id", "fkkontakt");
    }
    public function adresse()
    {
        return $this->hasOne('App\schuladresse', "id", "fkadresse");
    }
    public function bezeichnung()
    {
        return $this->hasOne('App\schulbezeichnung', "id", "fkbezeichnungen");
    }

    public function getRechtsform()
    {
        return $this->hasOne('App\key_rechtsform', "id", "rechtsform");
    }

    public function getTraeger()
    {
        return $this->hasOne('App\key_traeger', "Traegernummer", "traegernr");
    }

    public function getSchulform()
    {
        return $this->hasOne('App\key_schulformschluessel', "id", "schulform");
    }

    public function getSchulbetriebsschluessel()
    {
        return $this->hasOne('App\key_schulbetriebsschluessel', "id", "schulbetriebsschluessel");
    }

    public function schueler()
    {
      return $this->hasMany("App\User", "schulID", "schulnr");
    }
}
