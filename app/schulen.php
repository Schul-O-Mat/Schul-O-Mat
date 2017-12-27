<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schulen extends Model
{
    protected $table = "schulen";
    protected $primaryKey = "schulnr";

    public function details()
    {
        return $this->hasOne('App\schuldetails', "id", "schuldetailID");
    }

    public function bundesland()
        {
            return $this->hasOne('App\bundeslaender', "id", "bundeslandID");
        }

    public function schueler()
    {
      return $this->hasMany("App\User", "schulID", "id");
    }
}
