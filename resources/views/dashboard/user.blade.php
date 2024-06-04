@extends('base')
@section('title', 'Dashboard')
@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .container-fluid {
                padding: 10px 20px;
                margin-bottom: 20px;
            }

            .bg-primary {
                background-color: #007bff;
                /* Bootstrap primary color */
            }

            .text-white {
                color: white;
            }

            h1 {
                font-size: 1.5em;
            }

            #date {
                font-size: 1em;
            }

            .profile-section {
                margin-top: 20px;
            }

            .profile-header {
                background-color: #f8f9fa;
                padding: 20px;
                border-bottom: 1px solid #dee2e6;
                border-radius: 0.25rem 0.25rem 0 0;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .profile-picture {
                width: 120px;
                height: 120px;
                object-fit: cover;
                border: 3px solid #007bff;
            }

            .profile-name,
            .profile-plan {
                font-size: 1.5em;
                font-weight: bold;
                color: #343a40;
                margin-top: 15px;
            }

            .profile-email {
                font-size: 1em;
                color: #6c757d;
                margin-top: 5px;
            }

            .profile-body {
                padding: 20px;
                background-color: #ffffff;
                border: 1px solid #dee2e6;
                border-radius: 0 0 0.25rem 0.25rem;
            }

            .profile-button {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 10px;
                border: 1px solid #dee2e6;
                border-radius: 0.25rem;
                background-color: #f8f9fa;
                text-decoration: none;
                color: #212529;
                transition: background-color 0.2s ease-in-out;
                width: 100%;
            }

            .profile-button:hover {
                background-color: #e9ecef;
                color: #212529;
            }

            .profile-button i {
                margin-right: 10px;
            }

            .profile-button-text {
                margin-left: 10px;
            }

            @media (min-width: 768px) {
                .profile-button {
                    height: 60px;
                }
            }

            /* Responsive adjustments */
            @media (max-width: 600px) {
                .container-fluid {
                    padding: 10px;
                }

                h1 {
                    font-size: 1.2em;
                }

                #date {
                    font-size: 0.9em;
                }
            }
                    /* Responsive adjustments */
        @media (max-width: 600px) {
            .container-fluid {
                padding: 10px;
            }

            h1 {
                font-size: 1.2em;
            }

            #date {
                font-size: 0.9em;
            }
        }

        .progress-text-indicators {
        position: relative;
        top: 8px; /* adjust to position below the progress bar */
        font-size: 12px;
        color: #666;
        }

        .progress-text-indicators span {
            position: absolute;
            top: 0;
            transform: translateX(-50%);
        }

        .progress-text-indicators span:first-child {
            left: 0%;
        }

        .progress-text-indicators span:last-child {
            left: 100%;

        }
        .box {
            background-color: #FEFBF6;
            margin-bottom: 10px;
            padding: 20px;
            border: 1px solid #ddd;
            height: 180px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* BMI Tab */

        .bmi-metrics-box {
        background-color: #f9f9f9;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .bmi-metrics-box h2 {
        margin-top: 0;
        }

        .form-group {
        margin-bottom: 20px;
        }

        .form-group label {
        display: block;
        margin-bottom: 10px;
        }

        .form-group input[type="number"] {
        width: 100%;
        height: 40px;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        }

        .form-group input[type="number"]:read-only {
        background-color: #f0f0f0;
        cursor: not-allowed;
        }

        #update-metrics-btn {
        width: 100%;
        height: 40px;
        padding: 10px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        background-color: #337ab7;
        color: #fff;
        cursor: pointer;
        }

        #update-metrics-btn:hover {
        background-color: #23527c;
        }

        .modal {
        display: none;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1050;
        background-color: rgba(0, 0, 0, 0.5);
        }

        .modal.show {
        display: block;
        }

        .modal-dialog {
        max-width: 400px;
        margin: 40px auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
        padding: 15px;
        border-bottom: 1px solid #ddd;
        }

        .modal-header .btn-close {
        font-size: 24px;
        line-height: 1;
        color: #000;
        text-shadow: 0 1px 0 #fff;
        opacity: 0.5;
        cursor: pointer;
        }

        .modal-header .btn-close:hover {
        opacity: 1;
        }

        .modal-body {
        padding: 20px;
        }

        .modal-footer {
        padding: 15px;
        border-top: 1px solid #ddd;
        text-align: right;
        }

        .modal-footer .btn {
        margin-left: 10px;
        }

        #save-metrics-btn {
        background-color: #337ab7;
        color: #fff;
        cursor: pointer;
        }

        #save-metrics-btn:hover {
        background-color: #23527c;
        }
        </style>
    </head>

    <body>
        <header class="container-fluid bg-primary text-white" style="padding: 20px; margin-bottom: 20px">
            <h1>Dashboard</h1>
            <p id="date">
                {{ DateTime::createFromFormat('!m', date('m'))->format('F') . ' ' . date('d Y') }}
            </p>
            <p id="hasAssessment" class="d-none">{{ $withAssessment }}</p>
        </header>

        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">This week's leaderboards!</h5>
                        </div>
                        <div class="card-body">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="leaderboardDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Select a lift
                                </button>
                                <div class="dropdown-menu" aria-labelledby="leaderboardDropdown">
                                    <a class="dropdown-item" href="#" type='fitayo-exercise' data-lift="">Select a
                                        lift</a>
                                    <a class="dropdown-item" href="#" type='fitayo-exercise'
                                        data-lift="benchpress">Benchpress</a>
                                    <a class="dropdown-item" href="#" type='fitayo-exercise'
                                        data-lift="deadlift">Deadlift</a>
                                    <a class="dropdown-item" href="#" type='fitayo-exercise'
                                        data-lift="barbell-squats">Barbell Squats</a>
                                </div>
                            </div>
                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th scope="col">Ranking</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Weight (kg)</th>
                                    </tr>
                                </thead>
                                <tbody id="leaderboardTable">
                                    <!-- Table rows will be added here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title">News</h5>
                        </div>
                        <div class="card-body">
                            <p>John just surpassed Emily in the 1RM Benchpress with a new record of 150 kg!</p>
                            <p>Sarah just surpassed Michael in the 6RM Deadlift with a new record of 200 kg!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid bg-orange footer">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="navleaderboards" data-bs-toggle="tab" href="#nav-leaderboards" role="tab"
                    aria-controls="nav-leaderboards" aria-selected="true">Leaderboards </a>
                <a class="nav-link" id="navmilestones" data-bs-toggle="tab" href="#nav-milestones" role="tab"
                    aria-controls="nav-milestones" aria-selected="false">Milestones</a>
                <a href="#nav-bmi" class="nav-link" id="navbmi" role="tab" aria-controls="nav-bmi"
                    aria-selected="false" data-bs-toggle="tab">BMI Metrics</a>
                <a href="#nav-profile" class="nav-link" id="navprofile" role="tab" aria-controls="nav-profile"
                    aria-selected="false" data-bs-toggle="tab">Profile</a>
            </div><br>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-leaderboards" role="tabpanel"
                    aria-labelledby="navleaderboards">

                </div>
                <div class="tab-pane" id="nav-milestones" role="tabpanel" aria-labelledby="navmilestones">
                    <div class="nav nav-tabs" id="nav-tab-contents" role="tablist" style="margin-bottom: 20px">
                        <h1 style="margin-left: 5px; margin-right: 15px">CATEGORIES</h1>
                        <button class="nav-link active" id="nav-1rep-tab" data-bs-toggle="tab" data-bs-target="#nav-1rep" type="button" role="tab" aria-controls="nav-1rep" aria-selected="true">1 REP MAX</button>
                        <button class="nav-link" id="nav-6reps-tab" data-bs-toggle="tab" data-bs-target="#nav-6reps" type="button" role="tab" aria-controls="nav-6reps" aria-selected="false">6 REPS</button>
                        <button class="nav-link" id="nav-12reps-tab" data-bs-toggle="tab" data-bs-target="#nav-12reps" type="button" role="tab" aria-controls="nav-12reps" aria-selected="false">12 REPS</button>
                    </div>
                    <div class="tab-content" id="nav-tab-contentsContent"> 
                        <div class="tab-pane fade show active" id="nav-1rep" role="tabpanel" aria-labelledby="nav-1rep"> 
                            <div class="row">
                                <div class="box">
                                    <h3>BENCH PRESS</h3>
                                    <div class="progress-container">
                                        <div class="progress" style="height: 30px;">
                                            <div id="benchPress1RM" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
            
                                        <div class="progress-text-indicators">
                                            <span style="left: 0%;">0KG</span>
                                            <span style="left: 20%;">20KG</span>
                                            <span style="left: 40%;">40KG</span>
                                            <span style="left: 60%;">60KG</span>
                                            <span style="left: 80%;">80KG</span>
                                            <span style="left: 100%;">100KG</span>
                                        </div>
            
                                        <div class="progbtn" style="margin-top: 30px">
                                            <button class="btn btn-danger mt-2"  onclick="slackOff('benchPress1RM')">I slacked off</button>
                                            <button class="btn btn-success mt-2" style="float: right; margin-bottom: 5px;" onclick="advanceProgress('benchPress1RM')">Advance Progress</button>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="box">
                                    <h3>DEADLIFT</h3>
                                    <div class="progress-container">
                                        <div class="progress" style="height: 30px;">
                                            <div id="deadlift1RM" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
            
                                        <div class="progress-text-indicators">
                                            <span style="left: 0%;">0KG</span>
                                            <span style="left: 20%;">20KG</span>
                                            <span style="left: 40%;">40KG</span>
                                            <span style="left: 60%;">60KG</span>
                                            <span style="left: 80%;">80KG</span>
                                            <span style="left: 100%;">100KG</span>
                                        </div>
            
                                        <div class="progbtn" style="margin-top: 30px">
                                            <button class="btn btn-danger mt-2" onclick="slackOff('deadlift1RM')">I slacked off</button>
                                            <button class="btn btn-success mt-2" style="float: right; margin-bottom: 5px;" onclick="advanceProgress('deadlift1RM')">Advance Progress</button>
                                        </div>
            
                                    </div>
                                </div>
                                <div class="box">
                                    <h3>BARBELL SQUATS</h3>
                                    <div class="progress-container">
                                        <div class="progress" style="height: 30px;">
                                            <div id="barbellSquats1RM" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
            
                                        <div class="progress-text-indicators">
                                            <span style="left: 0%;">0KG</span>
                                            <span style="left: 20%;">20KG</span>
                                            <span style="left: 40%;">40KG</span>
                                            <span style="left: 60%;">60KG</span>
                                            <span style="left: 80%;">80KG</span>
                                            <span style="left: 100%;">100KG</span>
                                        </div>
            
                                        <div class="progbtn" style="margin-top: 30px">
                                            <button class="btn btn-danger mt-2" onclick="slackOff('barbellSquats1RM')">I slacked off</button>
                                            <button class="btn btn-success mt-2" style="float: right; margin-bottom: 5px;" onclick="advanceProgress('barbellSquats1RM')">Advance Progress</button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="tab-pane fade" id="nav-6reps" role="tabpanel" aria-labelledby="nav-6reps"> 
                            <div class="row">
                                <div class="box">
                                    <h3>BENCH PRESS</h3>
                                    <div class="progress-container">
                                        <div class="progress" style="height: 30px;">
                                            <div id="benchPress6RM" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
            
                                        <div class="progress-text-indicators">
                                            <span style="left: 0%;">0KG</span>
                                            <span style="left: 20%;">20KG</span>
                                            <span style="left: 40%;">40KG</span>
                                            <span style="left: 60%;">60KG</span>
                                            <span style="left: 80%;">80KG</span>
                                            <span style="left: 100%;">100KG</span>
                                        </div>
            
                                        <div class="progbtn" style="margin-top: 30px">
                                            <button class="btn btn-danger mt-2" onclick="slackOff('benchPress6RM')">I slacked off</button>
                                            <button class="btn btn-success mt-2" style="float: right; margin-bottom: 5px;" onclick="advanceProgress('benchPress6RM')">Advance Progress</button>
                                        </div>
            
                                    </div>
                                </div>
                                <div class="box">
                                    <h3>DEADLIFT</h3>
                                    <div class="progress-container">
                                        <div class="progress" style="height: 30px;">
                                            <div id="deadlift6RM" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
            
                                        <div class="progress-text-indicators">
                                            <span style="left: 0%;">0KG</span>
                                            <span style="left: 20%;">20KG</span>
                                            <span style="left: 40%;">40KG</span>
                                            <span style="left: 60%;">60KG</span>
                                            <span style="left: 80%;">80KG</span>
                                            <span style="left: 100%;">100KG</span>
                                        </div>
            
                                        <div class="progbtn" style="margin-top: 30px">
                                            <button class="btn btn-danger mt-2" onclick="slackOff('deadlift6RM')">I slacked off</button>
                                            <button class="btn btn-success mt-2" style="float: right; margin-bottom: 5px;" onclick="advanceProgress('deadlift6RM')">Advance Progress</button>
                                        </div>
            
                                    </div>
                                </div>
                                <div class="box">
                                    <h3>BARBELL SQUATS</h3>
                                    <div class="progress-container">
                                        <div class="progress" style="height: 30px;">
                                            <div id="barbellSquats6RM" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
            
                                        <div class="progress-text-indicators">
                                            <span style="left: 0%;">0KG</span>
                                            <span style="left: 20%;">20KG</span>
                                            <span style="left: 40%;">40KG</span>
                                            <span style="left: 60%;">60KG</span>
                                            <span style="left: 80%;">80KG</span>
                                            <span style="left: 100%;">100KG</span>
                                        </div>
            
                                        <div class="progbtn" style="margin-top: 30px">
                                            <button class="btn btn-danger mt-2" onclick="slackOff('barbellSquats6RM')">I slacked off</button>
                                            <button class="btn btn-success mt-2" style="float: right; margin-bottom: 5px;" onclick="advanceProgress('barbellSquats6RM')">Advance Progress</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            
                        <div class="tab-pane fade" id="nav-12reps" role="tabpanel" aria-labelledby="nav-12reps"> 
                            <div class="row">
                                <div class="box">
                                    <h3>BENCH PRESS</h3>
                                    <div class="progress-container">
                                        <div class="progress" style="height: 30px;">
                                            <div id="benchPress12RM" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
            
                                        <div class="progress-text-indicators">
                                            <span style="left: 0%;">0KG</span>
                                            <span style="left: 20%;">20KG</span>
                                            <span style="left: 40%;">40KG</span>
                                            <span style="left: 60%;">60KG</span>
                                            <span style="left: 80%;">80KG</span>
                                            <span style="left: 100%;">100KG</span>
                                        </div>
            
                                        <div class="progbtn" style="margin-top: 30px">
                                            <button class="btn btn-danger mt-2" onclick="slackOff('benchPress12RM')">I slacked off</button>
                                            <button class="btn btn-success mt-2" style="float: right; margin-bottom: 5px;" onclick="advanceProgress('benchPress12RM')">Advance Progress</button>
                                        </div>
            
                                    </div>
                                </div>
                                <div class="box">
                                    <h3>DEADLIFT</h3>
                                    <div class="progress-container">
                                        <div class="progress" style="height: 30px;">
                                            <div id="deadlift12RM" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
            
                                        <div class="progress-text-indicators">
                                            <span style="left: 0%;">0KG</span>
                                            <span style="left: 20%;">20KG</span>
                                            <span style="left: 40%;">40KG</span>
                                            <span style="left: 60%;">60KG</span>
                                            <span style="left: 80%;">80KG</span>
                                            <span style="left: 100%;">100KG</span>
                                        </div>
            
                                        <div class="progbtn" style="margin-top: 30px">
                                            <button class="btn btn-danger mt-2" onclick="slackOff('deadlift12RM')">I slacked off</button>
                                            <button class="btn btn-success mt-2" style="float: right; margin-bottom: 5px;" onclick="advanceProgress('deadlift12RM')">Advance Progress</button>
                                        </div>
                                    
                                    </div>
                                </div>
                                <div class="box">
                                    <h3>BARBELL SQUATS</h3>
                                    <div class="progress-container">
                                        <div class="progress" style="height: 30px;">
                                            <div id="barbellSquats12RM" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
            
                                        <div class="progress-text-indicators">
                                            <span style="left: 0%;">0KG</span>
                                            <span style="left: 20%;">20KG</span>
                                            <span style="left: 40%;">40KG</span>
                                            <span style="left: 60%;">60KG</span>
                                            <span style="left: 80%;">80KG</span>
                                            <span style="left: 100%;">100KG</span>
                                        </div>
            
                                        <div class="progbtn" style="margin-top: 30px">
                                            <button class="btn btn-danger mt-2" onclick="slackOff('barbellSquats12RM')">I slacked off</button>
                                            <button class="btn btn-success mt-2" style="float: right; margin-bottom: 5px;" onclick="advanceProgress('barbellSquats12RM')">Advance Progress</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="nav-bmi" role="tabpanel" aria-labelledby="navbmi">
                    @if ($assessment)
                        <div
                            class="row
                            @if ($assessment->bmi_classification == 'Underweight') bg-secondary
                            @elseif ($assessment->bmi_classification == 'Normal')
                                bg-primary
                            @elseif ($assessment->bmi_classification == 'Overweight')
                                bg-warning
                            @else
                                bg-danger @endif
                            ">
                            <div class="col">Height: {{ $assessment->height }} inches</div>
                            <div class="col">Weight: {{ $assessment->weight }} lbs</div>
                            <div class="col">BMI: {{ $assessment->bmi }}</div>
                            <div class="col">BMI Type: {{ $assessment->bmi_classification }}</div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col">No BMI assessment available.</div>
                        </div>
                    @endif
                </div>
                <div class="tab-pane profile-section" id="nav-profile" role="tabpanel" aria-labelledby="navprofile">
                <div class="profile-header text-center">
                    <img src="{{ auth()->user()->profile_image ? asset('images/' . auth()->user()->profile_image) : asset('images/blankprofile.png') }}" alt="Profile Picture" class="rounded-circle profile-picture">
                    <h4 class="profile-name">{{ auth()->user()->userProfile->firstName }} {{ auth()->user()->userProfile->lastName }}</h4>
                    <p class="profile-email">{{ auth()->user()->email }}</p>
                    <p class="profile-plan">Monthly plan</p>
                </div>
				<div class="profile-body">
					<div class="row">
						<div class="col-12 col-md-6 mb-3">
							<a href="{{ route('qr_code_page') }}" class="profile-button w-100">
								<i class="fa fa-qrcode"></i>
								<span class="profile-button-text">QR Code</span>
							</a>
						</div>
						<div class="col-12 col-md-6 mb-3">
							<a href="{{ route('profile.edit') }}" class="profile-button w-100">
								<i class="fa fa-edit"></i>
								<span class="profile-button-text">Edit Profile</span>
							</a>
						</div>
						<div class="col-12 col-md-6 mb-3">
							<a href="{{ route('profile.membership') }}" class="profile-button w-100">
								<i class="fa fa-id-card"></i>
								<span class="profile-button-text">Membership Details</span>
							</a>
						</div>
						<div class="col-12 col-md-6 mb-3">
							<a href="#" class="profile-button w-100">
								<i class="fa fa-key"></i>
								<span class="profile-button-text">Password and Security</span>
							</a>
						</div>
                        <div class="col-12 col-md-6 mb-3">
                            <a href="{{ route('profile.policies') }}" class="profile-button w-100">
                                <i class="fa fa-file-alt"></i>
                                <span class="profile-button-text">Policies and Regulations</span>
                            </a>
                        </div>
					</div>
				</div>

            </div>
            </div>
        </div>

        @if ($withAssessment)
            <button type="button" class="btn btn-primary d-none" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop" id="showModal">
            </button>

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Health Assessment</h1>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('new_assessment') }}" method="post" id="assessmentForm">

                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="regHeight" class="form-label">Height (in)</label>
                                        <input type="number" step="0.01" name="regHeight" id="regHeight"
                                            class="form-control" required>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="regWeight" class="form-label">Weight (lb)</label>
                                        <input type="number" step="0.01" name="regWeight" id="regWeight"
                                            class="form-control" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="regBMI" class="form-label">BMI</label>
                                        <input type="text" class="form-control" id="regBMI" name="regBMI"
                                            readonly step="0.01">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="regBMIType" class="form-label">BMI Type</label>
                                        <input type="text" class="form-control" id="regBMIType" name="regBMIType"
                                            readonly>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="regFit" class="form-label">Are you physically fit?</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="regFit" id="regFitYes"
                                                value="Yes" required>
                                            <label class="form-check-label" for="regFitYes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="regFit" id="regFitNo"
                                                value="No" required>
                                            <label class="form-check-label" for="regFitNo">No</label>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="regOper" class="form-label">Have you undergone an operation?</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="regOper"
                                                id="regOperYes" value="Yes" required>
                                            <label class="form-check-label" for="regOperYes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="regOper" id="regOperNo"
                                                value="No" required>
                                            <label class="form-check-label" for="regOperNo">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="regBP" class="form-label">Do you have high blood pressure?</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="regBP" id="regBPYes"
                                                value="Yes" required>
                                            <label class="form-check-label" for="regBPYes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="regBP" id="regBPNo"
                                                value="No" required>
                                            <label class="form-check-label" for="regBPNo">No</label>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="regHeart" class="form-label">Do you have a heart problem?</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="regHeart"
                                                id="regHeartYes" value="Yes" required>
                                            <label class="form-check-label" for="regHeartYes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="regHeart"
                                                id="regHeartNo" value="No" required>
                                            <label class="form-check-label" for="regHeartNo">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="regEmergName" class="form-label">Emergency Contact Name</label>
                                        <input type="text" name="regEmergName" id="regEmergName" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="regEmergContact" class="form-label">Emergency Contact Number</label>
                                        <input type="tel" name="regEmergContact" id="regEmergContact"
                                            class="form-control" required>
                                    </div>
                                </div>

                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if ($withAssessment)
            <button type="button" class="btn btn-primary d-none" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop" id="showModal">
            </button>

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Health Assessment</h1>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('new_assessment') }}" method="post" id="assessmentForm">

                                <div class="row">
                                    <div class="col-1"><label for="regHeight"
                                            class="form-label">Height<br>(in):&nbsp;</label></div>
                                    <div class="col-5"><input type="number" step="0.01" name="regHeight"
                                            id="regHeight" class="form-control" required="required"></div>
                                    <div class="col-1"><label for="regWeight"
                                            class="form-label">Weight<br>(lb):&nbsp;</label></div>
                                    <div class="col-5"><input type="number" step="0.01" name="regWeight"
                                            id="regWeight" class="form-control" required="required"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-1">
                                        <label for="regBMI" class="form-label">BMI:&nbsp;</label>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control" id="regBMI" name="regBMI"
                                            readonly="readonly" step="0.01">
                                    </div>
                                    <div class="col-1">
                                        <label for="regBMIType" class="form-label">BMI Type:&nbsp;</label>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control" id="regBMIType" name="regBMIType"
                                            readonly="readonly">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="regFit" class="form-label">Are you physically fit?</label><br>
                                        <div class="form-radio form-radio-inline">
                                            <label class="form-radio-label" for="regFit">Yes</label>
                                            <input class="form-radio-input" type="radio" name="regFit" id="regFit"
                                                value="Yes" required="required">
                                        </div>
                                        <div class="form-radio form-radio-inline">
                                            <label class="form-radio-label" for="regFit">No</label>
                                            <input class="form-radio-input" type="radio" name="regFit" id="regFit"
                                                value="No" required="required">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="regOper" class="form-label">Have you undergone an
                                            operation?</label><br>
                                        <div class="form-radio form-radio-inline">
                                            <label for="regOper" class="form-radio-label">Yes</label>
                                            <input type="radio" name="regOper" id="regOper" class="form-radio-input"
                                                value="Yes" required="required">
                                        </div>
                                        <div class="form-radio form-radio-inline">
                                            <label for="regOper" class="form-radio-label">No</label>
                                            <input type="radio" name="regOper" id="regOper" class="form-radio-input"
                                                value="No" required="required">
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="regBP" class="form-label">Do you have high blood
                                            pressure?</label><br>
                                        <div class="form-radio form-radio-inline">
                                            <label for="regBP" class="form-radio-label">Yes</label>
                                            <input type="radio" name="regBP" id="regBP" class="form-radio-input"
                                                value="Yes" required="required">
                                        </div>
                                        <div class="form-radio form-radio-inline">
                                            <label for="regBP" class="form-radio-label">No</label>
                                            <input type="radio" name="regBP" id="regBP" class="form-radio-input"
                                                value="No" required="required">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="regHeart" class="form-label">Do you have heart problem?</label><br>
                                        <div class="form-radio form-radio-inline">
                                            <label for="regHeart" class="form-radio-label">Yes</label>
                                            <input type="radio" name="regHeart" id="regHeart"
                                                class="form-radio-input" value="Yes" required="required">
                                        </div>
                                        <div class="form-radio form-radio-inline">
                                            <label for="regHeart" class="form-radio-label">No</label>
                                            <input type="radio" name="regHeart" id="regHeart"
                                                class="form-radio-input" value="No" required="required">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="regEmergName" class="form-label">Emergency Contact Name</label>
                                        <input type="text" name="regEmergName" id="regEmergName" class="form-control"
                                            required="required">
                                    </div>
                                    <div class="col-6">
                                        <label for="regEmergContact" class="form-label">Emergency Contact Number</label>
                                        <input type="tel" name="regEmergContact" id="regEmergContact"
                                            class="form-control" required="required">
                                    </div>
                                </div>
                                @csrf
                                <br>
                                <div class="row">

                                    <button type="submit" class="btn btn-primary" id="alertBtn">Submit</button>
                                </div>
                            </form>
                            <br>

                            <div class="row" id="alertBtnPlace">
                                <div class="col">


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endif
    </body>

    </html>
@endsection
