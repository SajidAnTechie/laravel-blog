@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1 class="display-4">Welcome to laravel!</h1>
        <p class="lead">This is a my first laravel projects Lorem ipsum dolor sit amet Dignissim ridiculus conubia commodo pede turpis mattis.</p>
        <hr class="my-4">
        @if(!Auth::guest())
            <p style="color:green">You are logged in</p>
        @else
        <p> <a class="btn btn-primary btn-medium" href="/login" role="button">Login</a>
            <a class="btn btn-success btn-medium" href="/register" role="button">Register</a>
        </p>
        @endif
    </div>
@endsection
        

