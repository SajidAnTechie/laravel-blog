@extends('layouts.app')

@section('content')

<form action="/create/assighment" method="post">
    @csrf
    <div class="form-group">
        <label for="subject">Subject Name</label>
        <input type="text" class="form-control" placeholder="Subject Name" name="subject">
    </div>
    <div class="form-group">
            <label for="assighment_name">Assighment Name</label>
            <input type="text" class="form-control" placeholder="Assighment Name" name="assigh_name">
    </div>
    <div class="form-group"> 
            <input type="submit" class="btn btn-success" name="Submit" value="Add">
    </div>
</form>
  

@endsection
