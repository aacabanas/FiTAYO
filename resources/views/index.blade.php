@extends('base')
@section('title', 'Profile')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>
                <div class="card-body">
                    @if(auth()->check())
                        <p>Name: {{ auth()->user()->name }}</p>
                        <p>Email: {{ auth()->user()->email }}</p>
                        <!-- Add other profile details here -->
                    @else
                        <p>You are not logged in.</p>
                        <a href="{{route('login')}}"><button class="btn btn-primary">Login</button></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
