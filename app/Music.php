<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    //
    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }
    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }
}
