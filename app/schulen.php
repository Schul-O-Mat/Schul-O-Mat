<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schulen extends Model
{
    public function kontakt()
    {
        return $this->hasOne('App\schulkontakt', "id", "fkadresse");
    }
}
