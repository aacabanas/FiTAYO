@extends('layout')
@section('title', 'Login')


@section('content')
    <div class="container">
        <h1>FiTAYO</h1>
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('login.Post') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-1"><label for="username" class="form-label"><h5>Username:</h5></label>
                </div>
                <div class="col-5"><input type="text" id="username" name="username" placeholder="Enter your username" class="form-control" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-1">
                    <label for="password" class="form-label"><h5>Password:</h5></label>
                </div>
                <div class="col-5">
                    <input type="password" id="password" name="password" placeholder="Enter your password" class="form-control" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4"><button type="submit" class="btn btn-primary">Login</button></div>
                <div class="col-4"></div>
            </div>
            
        </form>
    </div>


@endsection
