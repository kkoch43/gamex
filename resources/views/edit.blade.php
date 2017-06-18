{{ Form::model($game, ['route' => ['profile.update', $user->id], 'method' => "PUT"]) }}
<div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('games', 'Games:') }}
        <select class="form-control select2-kkk" name="games[]" multiple="multiple">
            @foreach($games as $game)
                <option value="{{ $game->id }}">{{ $game->title }}</option>
            @endforeach
        </select>

    </div>
</div>