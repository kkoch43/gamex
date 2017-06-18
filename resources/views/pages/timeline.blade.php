@extends('default')

@section('content')

   <div class="row">
       <div class="col-lg-4">
           <h3>Top games played</h3>
           @foreach($games as $game)

               {{ count($game->users()->get()) }}<small> users own this game</small>

           <div class="media">

               <div class="media-body">
                   <h4 class="media-heading"><a href="{{ route('view.show', ['id' => $game->id]) }}">{{ $game->title }}</a></h4>
                   <ul class="list-inline">
                       <li><a href="{{ route('game.like', ['gameId' => $game->id]) }}">Like</a></li>
                       <li>{{ $game->likes->count() }} {{ str_plural('like', $game->likes->count()) }}</li>
                       <a href="{{ route('owners.show', ['id' => $game->id]) }}" class="btn btn-default btn-sm">Request</a>
                   </ul>

               </div>
               <hr>
           </div>

           @endforeach

           <div class="row">
               <div class="col-md-12">
                   <div class="text-center">
                       {!! $games->links() !!}
                   </div>
               </div>
           </div>

       </div>

       <div class="col-lg-4">
           <form action={{route('search.results')}} role="search" class="navbar-form navbar-left">
               <div class="form-group">
                   <input type="text" name="query" class="form-control"
                          placeholder="Find games"/>
               </div>
               <button type="submit" class="btn btn-primary">Search</button>
           </form>
       </div>

       <div class="col-lg-4">
           <h3>Games you might like</h3>
           @foreach($recommends as $rec)

             @foreach($rec->genres()->get() as $genre)


                 @foreach($genre->games as $gg)
           <div class="media">

               <div class="media-body">

                   <h4 class="media-heading"><a href="{{ route('view.show', ['id' => $gg->id]) }}">{{ $gg->title }}</a></h4>

               </div>
           </div>
                     @endforeach
            @endforeach
           @endforeach



       </div>
   </div>
   </div>
@stop