<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function music()
    {
        return $this->belongsToMany('App\Music');
    }
}
