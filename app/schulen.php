<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schulen extends Model
{
    protected $table = "schulen";
    protected $primaryKey = "schulnr";
    public function kontakt()
    {
        
        return $this->hasOne('App\schulkontakt', "id", "fkadresse");
    }
}
