@extends('layouts.app')

@section('content')
        <h2>Create Post</h2></br>

                {{ Form::open(['action'=>['PostController@update',$posts->id],'method'=>'POST','enctype'=>'multipart/form-data']) }}
                <div class="form-group">
                    {{Form::label('title','Title')}}
                    {{Form::text('title',$posts->title,['class'=>'form-control','placeholder'=>'Title'])}}
                </div>
                <div class="form-group">
                        {{Form::label('body','Body')}}
                        {{Form::textarea('body',$posts->body,['class'=>'form-control','id'=>'article-ckeditor','placeholder'=>'Write a text'])}}
                </div>
                <div class="form-group">
                        {{Form::File('choose_image',['placeholder'=>'choose a file'])}}
                </div>
                {{Form::hidden('_method','PUT')}}
                <div class="form-group"> 
                        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                </div>
            {{ Form::close() }} 
@endsection
