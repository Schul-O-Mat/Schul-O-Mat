<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schuldetails extends Model
{
    protected $table = "schuldetails";

    //TODO: Funktion zum Deserialisieren des Arrays
    public function fragen()
    {
        return $this->hasOne("App\fragen", "id", "aktiviere_fragen");
    }
}