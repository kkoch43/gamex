@extends('default')

@section('title', '|Homepage')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>Welcome to GameX</h1>
                <p class="lead">A game exchanger and recommender system!</p>
                <p><a class="btn btn-primary btn-lg" href="{{ url('auth/register') }}" role="button">Sign Up</a></p>
                <p><a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Sign In</a></p>
            </div>

        </div>
    </div><!--end of header row -->


@stop