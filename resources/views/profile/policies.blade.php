@extends('base')
@section('title', 'Policies and Regulations')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow text-center p-4" style="background-color: #f8f9fa; border-radius: 10px; width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Policies and Regulations</h5>
                        <div class="policies-content text-start mb-4">
                            <h6>General Policies</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam dignissim vestibulum orci, at tempor nisl euismod vel. Integer euismod, elit in condimentum tincidunt, magna dui aliquet lorem, sit amet ultricies risus lorem eu metus. Nulla facilisi.</p>
                            
                            <h6>Gym Rules</h6>
                            <p>Curabitur sit amet augue at odio pulvinar laoreet. Maecenas non est at arcu euismod tincidunt. Sed eget turpis a elit varius convallis. Integer nec diam in est bibendum viverra.</p>
                            
                            <h6>Membership Agreement</h6>
                            <p>Vivamus venenatis lorem id lacus dictum, non commodo nunc volutpat. Phasellus auctor urna non justo faucibus, ac volutpat tortor faucibus. Donec consequat ante non risus aliquam, et molestie ipsum tempor.</p>
                            
                            <!-- Add more sections as needed -->
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
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); /* Moderated drop shadow */
        }

        .card-title {
            font-size: 2.2em;
            font-weight: bold;
            color: #343a40;
        }

        .policies-content h6 {
            font-size: 1.5em;
            font-weight: bold;
            color: #343a40;
            margin-top: 1em;
        }

        .policies-content p {
            font-size: 1.1em;
            color: #6c757d;
            text-align: left;
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
