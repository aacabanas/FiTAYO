@extends('base')
@section('title', 'Login')

@section('content')
<style>
    .login-container {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .login-header {
        margin-bottom: 30px;
    }
    .login-header h3 {
        font-size: 24px;
        font-weight: bold;
        color: #000;
    }
    .login-form label {
        font-weight: bold;
    }
    .login-form .btn {
        width: 100%;
    }
    .forgot-password {
        margin-top: 10px;
    }
    .alert {
        margin-top: 20px;
    }
</style>

<div class="container">
    <div class="login-container">
        <div class="login-header text-center">
            <h3>Login</h3>
        </div>
        <form action="{{route('login_post')}}" method="post" class="login-form">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            <div class="forgot-password text-center">
                <a href="#">Forgot Password?</a>
            </div>
        </form>

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
</div>
@endsection