<?php

namespace App\Http\Controllers;

use App\Game;
use App\Genre;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GamesController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //display a view of all the games
        //a form to create games

        $games = Game::all();
        $genres = Genre::all();

        return view('admin.games.games')->withGames($games)->withGenres($genres);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, array (
            'title' => 'required|max:255',
            'genre' => 'required|max:255'

        ));

        $game = new Game;

        $game->title = $request->title;
        $game->genre = $request->genre;
        $game->save();

        Session::flash('success', 'New game has been added');

        return redirect()->route('games.index');
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
        $game->fill(['user_count'=>count($users)])->save();

        return view('admin.games.show')->withGame($game)->with('genres', $genres)->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $game = Game::find($id);
        $genres = Genre::all();
        $gen = array();
        foreach ($genres as $genre) {
            $gen[$genre->id] = $genre->genre;
        }
        return view('admin.games.edit')->withGame($game)->withGenre($gen);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $game = Game::find($id);

        $this->validate($request, [
            'title' => 'required|max:255',
            'genre' => 'required|max:255',
        ]);

        $game->title = $request->title;
        $game->genre = $request->genre;
        $game->save();

        return redirect()->route('games.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getLike($gameId)
    {
        $game = Game::find($gameId);

        if(!$game) {
            return redirect()->route('dash');
        }

        if (Auth::user()->hasLikedGame($game)){
            return redirect()->back();
        }

        $like = $game->likes()->create([]);

        Auth::user()->likes()->save($like);


    }

    public function getOwnership($gameId)
{
    $game = Game::find($gameId);

    $own = $game->ownership()->create([]);
    Auth::user()->owns()->save($own);
}
}
