<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $searchable = [
        'name'
    ];

    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }
    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }
    public static function scopeSearch($query, $searchTerm)
    {
        $queryBanco = "MATCH (name) AGAINST ('$searchTerm')";
        return $query->select('id')->whereRaw($queryBanco);
    }
}
