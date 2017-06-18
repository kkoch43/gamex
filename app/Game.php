<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //
    protected $fillable=['user_count'];
    public function likes(){
        return $this->morphMany('App\Like', 'likeable');
    }

    public function genres()

    {
        return $this->belongsTo('App\Genre', 'genre');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function ownership(){
        return $this->morphMany('App\Ownership', 'ownership');
    }


}
