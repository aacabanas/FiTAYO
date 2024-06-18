<!-- resources/views/auth/passwords/reset.blade.php -->

@extends('base')

@section('title', 'Reset Password')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Reset Password</h1>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group mb-3">
            <label for="username" class="form-label">Username</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required autofocus>
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="password" class="form-label">New Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="password_confirmation" class="form-label">Confirm New Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-shield-lock-fill"></i></span>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-outline-secondary" onclick="window.location='{{ url()->previous() }}'">Cancel</button>
        </div>
    </form>
</div>
@endsection
