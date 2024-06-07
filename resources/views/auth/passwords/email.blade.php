<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg rounded-lg" style="background-color: #f8f9fa;">
                <div class="card-header text-center bg-primary text-white">
                    <h4>{{ __('Reset Password') }}</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-0 row">
                            <div class="col-md-6 offset-md-4 d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-primary px-4 py-2 me-2">
                                    {{ __('Reset Password') }}
                                </button>
                                <a href="{{ route('dashboard', ['tab' => 'profile']) }}" class="btn btn-secondary px-4 py-2">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .container {
        max-width: 750px;
    }

    .card {
        border: none;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        border-radius: 10px;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card-header {
        background-color: #007bff;
        color: #ffffff;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        padding: 20px;
    }

    .card-header h4 {
        font-size: 1.5em;
        margin: 0;
    }

    .form-control {
        border-radius: 0.25rem;
        padding: 10px;
    }

    .form-label {
        font-weight: bold;
        color: #343a40;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 10px 20px;
        font-size: 1em;
        border-radius: 0.25rem;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        padding: 10px 20px;
        font-size: 1em;
        border-radius: 0.25rem;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }

    .btn-secondary i {
        margin-right: 8px;
    }

    .mt-3 {
        margin-top: 1rem !important;
    }

    .me-2 {
        margin-right: 0.5rem;
    }
</style>
@endsection