<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //
    public function getResults(Request $request){

        $query = $request->input('query');

        if (!$query) {
            return redirect()-route('dash');
        }

        $games = Game::where('title', 'LIKE', "%{$query}%")
            ->get();


        return view('search.results')->with('games', $games);
    }
}
