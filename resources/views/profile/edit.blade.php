@extends('main')

@section('stylesheets')
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')



    <h3>Update your profile</h3>
    <div class="row">
        <div class="col-lg-6">

            {{ Form::model($user, ['route' => ['profile.update', $user->id], 'method' => "PUT"]) }}
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        {{ Form::label('first_name', 'First Name:') }}
                        {{ Form::text ('first_name', null, ['class' => 'form-control']) }}

                    </div>
                </div>

            <div class="col-lg-6">
                <div class="form-group">
                    {{ Form::label('last_name', 'Last Name:') }}
                    {{ Form::text ('last_name', null, ['class' => 'form-control']) }}

                </div>

        </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        {{ Form::label('username', 'Username:') }}
                        {{ Form::text ('username', null, ['class' => 'form-control']) }}

                    </div>

    </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        {{ Form::label('city', 'City:') }}
                        {{ Form::text ('city', null, ['class' => 'form-control']) }}

                    </div>

                </div>

               <!-- {{ Form::label('games', 'Games:', ['class' => 'form-spacing-top']) }}
                {{ Form::select('games[]', $games, null, ['class' => 'form-control select2-kkk', 'multiple' => 'multiple']) }}
-->
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

                <div class ="form-group">
                    {{ Form::submit('Save', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
                </div>
        </div>
    </div>
    </div>


    @stop

@section('scripts')

    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-kkk').select2();
        $('.select2-kkk').select2().val(gamesForThisUser).trigger('change');
    </script>


@endsection
