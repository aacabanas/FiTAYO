@extends('base')
@section('title', 'Membership Details')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow text-center p-4 rounded-lg" style="background-color: #f8f9fa;">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Current Membership Plan</h5>
                        <div class="membership-plan mb-4">
                            <h2 class="card-subtitle">{{ $userMembership->membership_plan }}</h2>
                        </div>
                        <div class="mb-4">
                            <div class="row">
                                <div class="col-6">
                                    <p class="mb-1 font-weight-bold">Start Date:</p>
                                    <p class="text-secondary">{{ \Carbon\Carbon::parse($userMembership->start_date)->format('F d, Y') }}</p>
                                </div>
                                <div class="col-6">
                                    <p class="mb-1 font-weight-bold">Expiry Date:</p>
                                    <p class="text-secondary">{{ \Carbon\Carbon::parse($userMembership->expiry_date)->format('F d, Y') }}</p>
                                </div>
                                <div class="col-12">
                                    <p class="mb-1 font-weight-bold">Price:</p>
                                    <p class="text-secondary">₱499.00</p>
                                    <p class="text-muted small">Pricing may vary</p>
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
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.3);
        }

        .card-title {
            font-size: 1.8em;
            font-weight: bold;
            color: #343a40;
        }

        .membership-plan {
            background-color: #000000;
            color: #fff;
            padding: 0.5em 1.5em;
            border-radius: 50px;
            display: inline-block;
            margin-bottom: 1.5em;
            font-size: 1em;
            text-transform: uppercase;
        }

        .card-subtitle {
            font-size: 1.5em;
            font-weight: bold;
            color: #fff;
        }

        .text-secondary {
            font-size: 1.2em;
            color: #6c757d !important;
        }

        .text-muted {
            font-size: 0.9em;
            color: #6c757d !important;
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

        .container {
            margin-top: 5em;
        }

        .row {
            margin-bottom: 1.5em;
        }
    </style>
@endsection