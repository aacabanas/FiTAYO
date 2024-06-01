@extends('base')
@section('title', 'Edit Profile')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card" style="background-color: #f8f9fa;">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <form id="profileForm" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                <label for="profile_image" style="cursor: pointer;">
                                    <img src="{{ $userProfile->profile_image ? asset('images/' . $userProfile->profile_image) : asset('images/blankprofile.png') }}" alt="Profile Image" class="rounded-circle" width="120" height="120">
                                    <input type="file" id="profile_image" name="profile_image" accept="image/jpeg,image/png" style="display: none;" onchange="document.getElementById('profileForm').submit();">
                                </label>
                            </form>
                            <h4 class="card-title mt-3">{{ $userProfile->firstName }} {{ $userProfile->lastName }}</h4>
                            <p class="card-text">{{ Auth::user()->email }}</p>
                        </div>
                        <form id="profileFormDetails" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group text-left">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $userProfile->firstName }}" required>
                            </div>
                            <div class="form-group text-left">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" value="{{ $userProfile->lastName }}" required>
                            </div>
                            <div class="form-group text-left">
                                <label for="birthdate" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $userProfile->birthdate }}" required>
                            </div>
                            <div class="form-group text-left">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary ml-2"><i class="fa fa-arrow-left"></i> Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            background-color: #f8f9fa;
            border: none;
        }

        .card-body {
            padding: 40px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            border-radius: 0.25rem;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .rounded-circle {
            cursor: pointer;
            object-fit: cover;
        }
    </style>
@endsection