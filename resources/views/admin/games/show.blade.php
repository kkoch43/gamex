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
        <div class="col-md-2">
            <a href="{{ route('games.edit', $game->id) }}" class="btn btn-primary pull-right btn-block" style="margin-top: 20px; ">Edit</a>
        </div>
        <div class="col-md-2">
            {{ Form::open(['route' => ['games.destroy', $game->id], 'method' => 'DELETE']) }}
            {{ Form::submit ('Delete', ['class' => 'btn btn-danger btn-block', 'style' => 'margin-top:20px;']) }}
            {{ Form::close() }}


        </div>
    </div>



@endsection