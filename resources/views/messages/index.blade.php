@extends('main')
@section('title', '| Inbox')

@section('content')
    <div class="row">
        <div class="col-lg-6">

            {{ Form::model($user, ['route' => 'message.send', 'method' => "post"]) }}
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        {{ Form::label('to_id', 'To:') }}
                        {{ Form::text ('to_id', $user->id, ['class' => 'form-control']) }}

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        {{ Form::label('body', 'Message') }}
                        {{ Form::text ('body', null, ['class' => 'form-control']) }}

                    </div>

                </div>



                <div class ="form-group">
                    {{ Form::submit('Send', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
                </div>
            </div>
        </div>
    </div>

@endsection