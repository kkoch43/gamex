<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'password', 'games_owned', 'city',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasLikedGame(Game $game){
        return (bool) $game->likes
            ->where('likeable_id',$game->id )
            ->where('user_id', $this->id)
            ->count();

    }

    public function likes(){
        return $this->hasMany('App\Like', 'user_id');
    }

    public function owns()
    {
        return $this->hasMany('App\Ownership', 'user_id');
    }

    public function games(){
        return $this->belongsToMany('App\Game');
    }

    public function tests(){
        return $this->belongsToMany('App\Test');

    }

    public function genres(){
        return $this->belongsToMany('App\Genre');
    }

    public function messages(){
        return $this>belongsToMany('App\Message');
    }


}
