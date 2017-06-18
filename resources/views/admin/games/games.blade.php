@extends('main')

@section('title', '| Genres')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}

@endsection


@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Games</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($games as $game)
                    <tr>
                        <td>{{ $game->id }}</td>
                        <td><a href="{{ route('games.show', $game->id) }}">{{ $game->title }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div> <!-- end of col-md-8 -->

        <div class="col-md-3">
            <div class="well">
                {!! Form::open(['route' => 'games.store']) !!}
                <h2>New </h2>
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, ['class' => 'form-control']) }}

                {{ Form::label('genre', 'Genre:') }}
                <select class="form-control" name="genre">
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                    @endforeach
                </select>


                {{ Form::submit('Create new genre', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection