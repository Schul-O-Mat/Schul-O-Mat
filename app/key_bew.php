<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class key_bew extends Model
{
    protected $table = "key_bew";

    public function keyword()
    {
        return $this->hasOne("App\keywords", "id", "keywordID");
    }

    public function user()
        {
            return $this->hasOne("App\User", "id", "userID");
        }
}
