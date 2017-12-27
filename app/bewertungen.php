<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bewertungen extends Model
{
    protected $table = "bewertungen";

    public function user()
    {
        return $this->hasOne("App\User", "id", "userID");
    }

    public function frage()
    {
        return $this->hasOne("App\frage", "id", "frageID");
    }
}
