@extends('main')

@section('content')
    <h3>Your search for "{{ Request::input('query') }}" </h3>

    @if (!$games->count())
        <p>No results found, pole</p>
    @endif

    <div class="row">
        <div class="col-lg-12">

            @foreach ($games as $game)

                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="img-circle" alt="Cinque Terre" width="30" height="30" src="http://i3.mirror.co.uk/incoming/article8467993.ece/ALTERNATES/s615b/FIFA17ps42DPFTglo.jpg">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#">{{ $game->title }}</a></h4>
                            <ul class="list-inline">
                                <li><a href="{{ route('game.like', ['gameId' => $game->id]) }}">Like</a></li>
                                <li>{{ $game->likes->count() }} {{ str_plural('like', $game->likes->count()) }}</li>
                                <a href="{{ route('owners.show', ['id' => $game->id]) }}" class="btn btn-default btn-sm">Request</a>
                            </ul>

                        </div>
                        <hr>
                    </div>


            @endforeach

        </div>
    </div>

@stop