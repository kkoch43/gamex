@extends('main')

@section('content')

    <div class="row">
        <div class="col-lg-5">
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" alt="#" src="#">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><a href="#">{{ $users->username }}</a></h4>
                    @if ($users->city)
                        <p>{{ $users->city }}</p>
                    @endif

                </div>
            </div>
            <hr>

            <div class="row">
                <h2>Personal Details</h2>
                <p>First Name: {{$users->first_name }}</p>
                <p>Last Name: {{$users->last_name }}</p>
                <p>City: {{$users->city }}</p>
                <hr>
                <h2>Games I own</h2>
                <div class="tags">
                @foreach ($users->games as $game)
                    <span class="label label-default">{{ $game->title }}</span>

                    @endforeach
                </div>



            </div>
        </div>
        <div class="col-md-7">
            <a href="{{ route('profile.edit', $users->id) }}" class="btn btn-primary pull-right btn-small" style="margin-top: 20px; ">Edit</a>
        </div>
    </div>

    @stop
