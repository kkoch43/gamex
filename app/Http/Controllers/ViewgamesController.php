<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Game;
use App\Genre;
use Session;

use Illuminate\Support\Facades\Auth;

class ViewgamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $games = Game::all();
        $genres = Genre::all();

        return view('game.index')->withGames($games)->withGenres($genres);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $game = Game::find($id);
        $genres = $game->genres()->get();
        $users = $game->users()->get();
        $game = Game::find($id);

        $game->fill(['user_count'=>count($users)])->save();

        return view('games.show')->withGame($game)->with('genres', $genres)->with('users', $users);

        $game->fill(['user_count'=>count($users)])->save();
    }
}

