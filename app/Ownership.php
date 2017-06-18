<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ownership extends Model
{
    //
    protected $table = 'gameowners';


    public function ownership(){
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id' );
    }
}
