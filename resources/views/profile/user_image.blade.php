@extends('layouts.app')

@section('content')
    <div class="profile">
        <div class="user_image">
        <img src="/storage/user_images/{{$user->user_image}}" id="profile">
        </div>
        <div class="user_profile">
            <h3>{{$user->name}}</h3>
            <small>Update Your Profile</small>
             <form action="/update" method="post" enctype='multipart/form-data'>
                <input type="file" name="choose_profile">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" name="submit" class="btn btn-primary" value="Update">
            </form> <br/>

            <form action="/remove/{{$user->id}}" method="post" enctype='multipart/form-data'>
                <input type="submit" name="submit"  value="Remove" class="btn btn-danger">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    
    </div>
{{-- 
    {{ Form::open(['action'=>['ProfileController@remove',$user->id],'method'=>'POST','class'=>'float-right']) }}
            {{FORM::hidden('_method','DELETE')}}
            {{FORM::submit('Delete',['class'=>'btn btn-primary'])}}
    {{ Form::close() }}  --}}
         
        </div>
    </div>


              
@endsection
