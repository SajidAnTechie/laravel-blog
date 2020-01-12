@extends('layouts.app')

@section('content')
        <a href="/posts">
            <button type="button" class="btn btn-outline-secondary">Go Back</button>
        </a></br></br>
            <div class="well">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="/storage/cover_images/{{$post->cover_image}}" style="width:100%" alt="">
                    </div>
                    <div class="col-sm-8">
                        <h3>{{$post->title}}</h3>
                        <p>{!!$post->body!!}</p>
                        <small>Created at {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                </div>   
            </div> 
            @if(!Auth::guest())      
            @if(Auth::user()->id==$post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn btn-info" >Edit</a>      
            {{ Form::open(['action'=>['PostController@destroy',$post->id],'method'=>'POST','class'=>'float-right']) }}
                {{FORM::hidden('_method','DELETE')}}
                {{FORM::submit('Delete',['class'=>'btn btn-danger'])}}
        {{ Form::close() }} <br/>  <br/>  <br/> 
        @endif
        @endif 
        @comments(['model' => $post])   
@endsection
