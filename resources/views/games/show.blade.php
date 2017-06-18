@extends('main')

@section('title', "|  $game->title  Tag")


@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1> {{ $game->title }}</h1>

            @foreach ($genres as $genre)
                <span class="label label-default"> {{ $genre->genre }}</span>
            @endforeach

            <hr>
            <h3>Users who own this game</h3>

            @foreach ($users as $user)
                <p>{{ $user->username }}</p>
            @endforeach

        </div>

    </div>



@endsection