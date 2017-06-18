@extends('main')

@section('content')

    <h3>Owners of this game</h3>

    <div class="row">

        <div class="col-lg-5">
            @foreach($users as $user)
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" alt="#" src="#">
                    <a  href="{{ route('contact.show', ['userId' => $user->id]) }}" class="btn btn-default btn-sm pull-right">Contact</a>
                </a>
                <div class="media-body">

                    <h4 class="media-heading"><a href="#">{{ $user->username }}</a></h4>
                    @if ($user->city)
                        <p>{{ $user->city }}</p>
                    @endif




                </div>
            </div>
            @endforeach
            <hr>


        </div>


    </div>

@stop
