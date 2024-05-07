@extends('base')
@section('title', 'Home')

@section('content')

    <a href="{{route('login')}}"><button class="btn btn-primary">Login</button></a>
    <a href="{{route('register')}}"><button class="btn btn-primary">Register</button></a>
    
@endsection
