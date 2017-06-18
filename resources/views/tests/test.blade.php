@extends('main')

@section('title', '| All Tests')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Tests</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($tests as $test)
                    <tr>
                        <td>{{ $test->id }}</td>
                        <td>{{ $test->title }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div> <!-- end of col-md-8 -->

        <div class="col-md-3">
            <div class="well">
                {!! Form::open(['route' => 'tests.store']) !!}
                <h2>New Test</h2>
                {{ Form::label('title', 'Name:') }}
                {{ Form::text('title', null, ['class' => 'form-control']) }}

                {{ Form::label('genre', 'Genre:') }}
                <select class="form-control" name="genre">
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
                    @endforeach
                </select>

                {{ Form::submit('Create new test', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection