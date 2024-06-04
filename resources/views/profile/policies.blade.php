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
                            <h6>Waiver</h6>
                            <p>In acceptance of my application for bodybuilding or group exercise by Stamina Fitness Centre, I:</p>
                            <ol>
                                <li>
                                    Acknowledge and agree that I understand the nature of physical fitness activities I will participate in and that I am qualified, in good health, and in proper physical condition to participate.
                                </li>
                                <li>
                                    Fully understand that: Martial arts (Taekwondo, Shotokan, Karate, Muay Thai, etc.), group exercise, and bodybuilding involve risks and dangers that may arise from my own actions or the actions of others participating in these activities. I understand that there may be other risks including economic loss or cost damages as a result of my participation.
                                </li>
                                <li>
                                    Agree and warrant that I will examine and inspect each activity I participate in for physical fitness and body conditioning, and if I observe any condition which I consider unacceptable or dangerous, I will notify the authority in charge of the activity until the condition has been corrected to my satisfaction.
                                </li>
                                <li>
                                    Hereby release and discharge Stamina Fitness Centre, the association, the academy, individual officers, and instructors from all liability, losses, claims, and demands should anything happen to me within the premises of Stamina Fitness Centre. If anyone on my behalf makes a claim against the management, I will hold each of them harmless as a result of such a claim.
                                </li>
                                <li>
                                    Understand that the membership fee is non-transferable and non-refundable.
                                </li>
                            </ol>
                            <h6>Parental Consent</h6>
                            <p>
                                As the minor's parent or legal guardian, I fully understand the agreement above and believe that he/she is qualified to participate in the Physical Fitness activities of Stamina Fitness Centre.
                            </p>
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

        .policies-content p, .policies-content ol {
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