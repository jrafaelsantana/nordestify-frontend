<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    //
    public function musics(){
        return $this->hasMany('App\Music');
    }
}
