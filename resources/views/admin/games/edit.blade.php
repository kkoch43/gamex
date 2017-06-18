@extends('main')

@section('title', "| Edit Games")

@section('content')

    {{ Form::model($game, ['route' => ['games.update', $game->id], 'method' => "PUT"]) }}

    {{ Form::label('title', 'Title:') }}
    {{ Form::text('title', null, ['class' => 'form-control']) }}

    {{ Form::label('genre', 'Genre:') }}
    {{ Form:: select('genre', $genre, null, ['class' => 'form-control']) }}

    {{ Form::submit('Save Changes', ['class' => 'btn btn-success', 'style' => 'margin-top:20px']) }}

    {{ Form::close() }}

@endsection