@extends('main')

@section('title', '| Inbox')

@section('content')

    @foreach($messages as $message)
 {{ $user->username }}


        {{$message->user_id}}<p>{{ $message->body }}</p>
        <small>{{ $message->created_at }}</small>
        <a href="{{ route('contact.show', ['userId' => $message->user_id]) }}" class="btn btn-default btn-sm">Reply</a>

        <hr>
    @endforeach


    @endsection