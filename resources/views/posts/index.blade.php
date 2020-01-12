@extends('layouts.app')

@section('content')
        <h2>Posts</h2></br>
       
        @if (count($posts)>0)
            @foreach ($posts as  $post)
            <div class="well">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="/storage/cover_images/{{$post->cover_image}}" style="width:100%" alt="">
                    </div>
                    <div class="col-sm-8">
                            <h3><a href="posts/{{$post->id}}">{{$post->title}}</a></h3>
                            <small>Created at {{$post->created_at}} by <span class="style=font-weight:bold;">{{$post->user->name}}</span></small>   
                    </div>
                </div>
            </div>
            @endforeach
            {{-- {{$posts->links()}} --}}
        @else
            <p>No Posts</p>
        @endif       
@endsection
