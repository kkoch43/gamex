<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Game;
use App\Genre;
use Session;

use Illuminate\Support\Facades\Auth;

class OwnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($gameId)
    {
        //
        $game = Game::find($gameId);
        $genres = $game->genres()->get();
        $users = $game->users()->get();

        return view('owners.index')->withGame($game)->withGenres($genres)->withUsers($users);
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $game = Game::find($id);
        $genres = $game->genres()->get();
        $users = $game->users()->get();

        return view('owners.show')->withGame($game)->with('genres', $genres)->with('users', $users);
    }






}
