<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class key_bew extends Model
{
    protected $table = "key_bew";

    public function keywords()
    {
        return $this->hasOne("App\keywords", "id", "keywordID");
    }

    public function bewertung()
    {
        return $this->hasOne("App\bewertungen", "id", "bewertungID");
    }
}
