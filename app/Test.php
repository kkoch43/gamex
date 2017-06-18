<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function genres()

    {
        return $this->belongsTo('App\Genre', 'genre');
    }
}
