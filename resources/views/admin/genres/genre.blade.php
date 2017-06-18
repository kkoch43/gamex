@extends('main')

@section('title', '| Genres')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Game Genres</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($genres as $genre)
                <tr>
                    <td>{{ $genre->id }}</td>
                    <td>{{ $genre->genre }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div> <!-- end of col-md-8 -->

        <div class="col-md-3">
            <div class="well">
                {!! Form::open(['route' => 'genres.store']) !!}
                <h2>New </h2>
                {{ Form::label('genre', 'Name:') }}
                {{ Form::text('genre', null, ['class' => 'form-control']) }}

                {{ Form::submit('Create new genre', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection