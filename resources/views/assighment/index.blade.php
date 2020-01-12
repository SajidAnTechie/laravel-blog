@extends('layouts.app')

@section('content')

<div class="post">
    <div class="assighment">
            <h2>Your Assighments</h2>
            <a href="/add/assighment" class="btn btn-primary">Add Assighments</a>
    </div>

    <table class="table table-striped">
        <th>Subject</th>
        <th>Given</th>
        <th>Given At</th>
        <th>Completed</th>
        <th>Actions</th>
        <th></th>
        @if(count($assighments)>0) 
            @foreach ($assighments as $assighment)
                <tr class="{{$assighment->completed ? 'line-through':''}}">
                
                    <td>{{$assighment->subject}}</td>
                    <td>{{$assighment->assigh_name}}</td>
                    <td>{{$assighment->created_at}}</td>
                    <td>{{$assighment->completed}}</td>
                    <td>
                    <form action="/assighment/completed/{{$assighment->id}}"  method="POST">
                            {{ method_field('PUT') }}
                            @csrf
                            <label class="checkbox" for="completed">
                                    <input type="checkbox" onchange="this.form.submit()" {{$assighment->completed ? 'checked':''}}  name="completed">
                                    Completed
                            </label>
                    </form>
                    </td>
                    <td>
                        <form action="/assighment/delete/{{$assighment->id}}"  method="POST">
                            {{ method_field('DELETE') }}
                            @csrf
                            <input type="submit" value="Delete" class="btn btn-danger" name="delet_assighment">
                        </form>
                    </td>
                </tr>
            @endforeach
            @else
                <p>No Post</p>
            @endif
    </table>
</div>  

@endsection
