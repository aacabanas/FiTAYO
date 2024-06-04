@extends('base')
@section('title', 'Membership Details')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow text-center p-4" style="background-color: #f8f9fa; border-radius: 10px;">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Current Membership Plan</h5>
                        <div class="membership-plan mb-4">
                            <h2 class="card-subtitle">{{ $userMembership->membership_plan }}</h2>
                        </div>
                        <div class="mb-4">
                            <div class="row">
                                <div class="col-6">
                                    <p class="mb-1"><strong>Start Date:</strong></p>
                                    <p>{{ \Carbon\Carbon::parse($userMembership->start_date)->format('F d, Y') }}</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-1"><strong>Expiry Date:</strong></p>
                                    <p>{{ \Carbon\Carbon::parse($userMembership->expiry_date)->format('F d, Y') }}</p>
                                </div>
                                <div class="col-12">
                                    <p class="mb-1"><strong>Price:</strong></p>
                                    <p>₱499.00</p>
                                    <p class="text-muted">Pricing may vary</p>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            border: none;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 2.2em; 
            font-weight: bold;
            color: #343a40;
        }

        .membership-plan {
            background-color: #000;
            color: #fff;
            padding: 0.5em 1em;
            border-radius: 50px; 
            display: inline-block;
            margin-bottom: 1em;
        }

        .card-subtitle {
            font-size: 1.3em;
            font-weight: bold;
            color: #fff; 
        }

        .text-muted {
            font-size: 1.2em;
            color: #6c757d !important;
        }

        .btn-outline-primary {
            border-color: #007bff;
            color: #007bff;
            font-size: 1.2em;
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            color: #fff;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .btn-sm {
            font-size: 1.1em;
        }

        .card-body {
            padding: 2em;
        }

        .container {
            margin-top: 5em;
        }

        .row {
            margin-bottom: 1.5em;
        }
    </style>
@endsection