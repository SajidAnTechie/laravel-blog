@extends('layouts.app')

@section('content')
        <h2>Hello,This is About pages</h2>
        <a href="/services">Hello</a>
        
        @if(count($name)>1)
         <ul>
            @foreach($name as $name)
            <li>{{$name}}</li> 
            @endforeach
        </ul>
            @else
            <h2>One item</h2>
            @endif
        
@endsection
