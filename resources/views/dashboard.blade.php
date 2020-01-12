@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Dashboard >><small style="font-weight:old"> welcome {{auth()->user()->name}}</small></div>
            </div><br>
            <div class="dashbord">
                <a class="btn btn-primary" href="/posts/create">Create</a><br><br>
                <h4>Your Blog Posts</h4>
            </div>
            <div class="post">
                <table class="table table-striped">
                    <th>Title</th>
                    @if(count($posts)>0) 
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                            <td><a href="posts/{{$post->id}}/edit" class="btn btn-success">Edit</a></td>
                                <td>
                                        {{ Form::open(['action'=>['PostController@destroy',$post->id],'method'=>'POST','class'=>'float-right']) }}
                                        {{FORM::hidden('_method','DELETE')}}
                                        {{FORM::submit('Delete',['class'=>'btn btn-danger'])}}
                                        {{ Form::close() }} 
                                </td>
                            </tr>
                        @endforeach
                        @else
                            <p>No Post</p>
                        @endif
                </table>
            </div>
        </div>
    </div>

@endsection
