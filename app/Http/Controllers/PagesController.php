<?php

namespace App\Http\Controllers;

use App\Game;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    //
    public function getIndex() {

        $user = Auth::user();
        $recommends= $user->games()->get();






        //$recgames = Game::where('genre', $recommends)->get();


        $likes =



        $games = Game::orderBy('user_count', 'desc')->paginate(4);


        return view('pages.timeline')->withGames($games)->withRecommends($recommends);
    }

    public function getWelcome(){
        return view('pages.welcome');
    }

    public function getSignup() {
        return view('auth.signup');
    }

    public function getSignin() {
        return view('auth.signin');
    }

    public function getProfileEdit($id) {
        $user = User::find($id);
        $games = Game::all();


        return view('edit')->withUser($user)->withGames($games);

}


}
