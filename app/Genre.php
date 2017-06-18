<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //

    protected $table = 'genres';

    public function games()
    {
        return $this->hasMany('App\Game', 'genre');
    }

    public function tests()
    {
        return $this->hasMany('App\Test', 'genre');
    }


}
