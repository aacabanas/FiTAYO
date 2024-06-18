@extends('base')
@section('title', 'Dashboard')
@section('content')

<style>
        .qr-code-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .qr-code-image {
            border: 5px solid #000;
            padding: 10px;
            background-color: #fff;
            max-width: 100%;
            height: auto;
        }

        .scan-me {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 15px;
            padding: 10px;
            background-color: #000;
            color: #fff;
            border-radius: 10px;
            font-size: 1.2em;
            font-weight: bold;
        }

        .scan-me i {
            margin-right: 10px;
        }

        .scan-me-text {
            margin-left: 10px;
        }

        .qr-instruction {
            margin-top: 10px;
            font-size: 1.2em;
            color: #212529;
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

        .rounded {
            border-radius: 10px;
        }

        .btn-secondary, .btn-primary {
            padding: 10px 20px;
            font-size: 1em;
            border-radius: 0.25rem;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .navbar-nav {
            display: flex;
            justify-content: center;
        }

        .nav-link.active {
            font-weight: bold; 
        }

        .nav-link:hover,
        .nav-link:focus {
            color: rgba(255, 255, 255, 0.75); 
            text-decoration: none; 
        }

        .container-fluid {
            padding: 10px;
            margin-bottom: 20px;
        }

        .card-body {
            padding: 40px;
        }

        .bg-primary {
            background-color: #007bff;
        }

        .text-white {
            color: white;
        }

        h1 {
            font-size: 1.2em;
        }

        #date {
            font-size: 0.9em;
        }

        .box {
            background-color: #FEFBF6;
            margin-bottom: 10px;
            padding: 15px;
            border: 1px solid #ddd;
        }

        .progress-text-indicators {
        position: relative;
        top: 8px;
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

        .bmi-metrics-box {
            background-color: #f9f9f9;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .bmi-metrics-box h2 {
            margin-top: 0;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
        border-radius: 0.25rem;
        padding: 10px;
        }

        .form-label {
            font-weight: bold;
            color: #343a40;
        }

        .form-group input[type="number"] {
            width: 100%;
            height: 40px;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input[type="number"]:read-only {
            background-color: #f0f0f0;
            cursor: not-allowed;
        }

        #update-metrics-btn,
        #save-metrics-btn {
            width: 100%;
            height: 40px;
            padding: 10px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #update-metrics-btn {
            background-color: #337ab7;
            color: #fff;
        }

        #update-metrics-btn:hover,
        #save-metrics-btn:hover {
            background-color: #23527c;
        }

        .modal-dialog {
            max-width: 100%;
            margin: 10% auto;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            padding: 10px;
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
            padding: 10px;
        }

        .modal-footer {
            padding: 10px;
            border-top: 1px solid #ddd;
            text-align: right;
        }

        .modal-footer .btn {
            margin-left: 5px;
        }

        .profile-content,
        .page-content {
            display: none;
        }

        .active-content {
            display: block;
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
    </style>
 
        <header class="container-fluid bg-primary text-white" style="padding: 20px; margin-bottom: 20px; margin-top: 20px">
            <h1>Leaderboards</h1>
            <p class="d-none" id="hasAssessment">{{ $withAssessment }}</p>
            <p id="date">
                {{ DateTime::createFromFormat('!m', date('m'))->format('F'). ' '. date('d Y') }}
            </p>
        </header> 
        <div class="container-fluid bg-orange footer">
            <nav class="navbar navbar-expand navbar-dark bg-primary text-white fixed-bottom">
                <ul class="navbar-nav nav justified w-100">
                    <li class="nav-item">
                    <a href="#" id="nav-leaderboards-tab" data-bs-toggle="tab" data-bs-target="#nav-leaderboards" class="nav-link active" role="tab" aria-controls="nav-leaderboards" aria-selected="true">Leaderboards</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" id="nav-milestones-tab" data-bs-toggle="tab" data-bs-target="#nav-milestones" class="nav-link" role="tab" aria-controls="nav-milestones" aria-selected="false">Milestones</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" id="nav-bmi-tab" data-bs-toggle="tab" data-bs-target="#nav-bmi" class="nav-link" role="tab" aria-controls="nav-bmi" aria-selected="false">My BMI</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" class="nav-link" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                    </li>     
                </ul>
            </nav>

            <!-- Tab content -->
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-leaderboards" role="tabpanel" aria-labelledby="nav-leaderboards-tab">
                    <!-- Leaderboards content goes here -->
                    
                    
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist" style="margin-bottom: 20px">
                            <h1 style="margin-left: 5px; margin-right: 15px">LIFTS</h1>
                            <button class="nav-link active" id="nav-bench-tab" data-bs-toggle="tab" data-bs-target="#nav-bench" type="button" role="tab" aria-controls="nav-bench" aria-selected="true">BENCH PRESS</button>
                            <button class="nav-link" id="nav-deadlift-tab" data-bs-toggle="tab" data-bs-target="#nav-deadlift" type="button" role="tab" aria-controls="nav-deadlift" aria-selected="false">DEADLIFT</button>
                            <button class="nav-link" id="nav-squats-tab" data-bs-toggle="tab" data-bs-target="#nav-squats" type="button" role="tab" aria-controls="nav-squats" aria-selected="false">SQUATS</button>
                        </div>
                    </nav>

                    <!-- Tables for each category -->
                    
                    <div class="tab-content">
                        <div id="nav-bench" class="tab-pane fade show active" role="tabpanel" aria-labelledby="nav-bench-tab">
                            <div class="category-box mb-4">
                                <h6>1 REP MAX</h6>
                                <table class="table mb-3 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Weight (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table1RepMaxBench">
                                        <!-- Table rows will be populated dynamically -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="category-box mb-4">
                                <h6>6 REPS</h6>
                                <table class="table mb-3 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Weight (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table6RepsBench">
                                        <!-- Table rows will be populated dynamically -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="category-box mb-4">
                                <h6>12 REPS</h6>
                                <table class="table mb-3 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Weight (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table12RepsBench">
                                        <!-- Table rows will be populated dynamically -->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="nav-deadlift" class="tab-pane fade" role="tabpanel" aria-labelledby="nav-deadlift-tab">
                            <div class="category-box mb-4">
                                <h6>1 REP MAX</h6>
                                <table class="table mb-3 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Weight (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table1RepMaxDeadlift">
                                        <!-- Table rows will be populated dynamically -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="category-box mb-4">
                                <h6>6 REPS</h6>
                                <table class="table mb-3 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Weight (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table6RepsDeadlift">
                                        <!-- Table rows will be populated dynamically -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="category-box mb-4">
                                <h6>12 REPS</h6>
                                <table class="table mb-3 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Weight (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table12RepsDeadlift">
                                        <!-- Table rows will be populated dynamically -->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="nav-squats" class="tab-pane fade" role="tabpanel" aria-labelledby="nav-squats-tab">
                            <div class="category-box mb-4">
                                <h6>1 REP MAX</h6>
                                <table class="table mb-3 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Weight (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table1RepMaxSquats">
                                        <!-- Table rows will be populated dynamically -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="category-box mb-4">
                                <h6>6 REPS</h6>
                                <table class="table mb-3 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Weight (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table6RepsSquats">
                                        <!-- Table rows will be populated dynamically -->
                                    </tbody>
                                </table>
                            </div>

                            <div class="category-box mb-4">
                                <h6>12 REPS</h6>
                                <table class="table mb-3 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Weight (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table12RepsSquats">
                                        <!-- Table rows will be populated dynamically -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                            
                </div>

                <div class="tab-pane fade" id="nav-milestones" role="tabpanel" aria-labelledby="nav-milestones-tab">
                    <header class="container-fluid bg-primary text-white" style="padding: 20px; margin-bottom: 20px; margin-top: 20px">
                        <h1>Milestones</h1>
                        <p class="d-none" id="hasAssessment">{{ $withAssessment }}</p>
                        <p id="date">
                            {{ DateTime::createFromFormat('!m', date('m'))->format('F') . ' ' . date('d Y') }}
                        </p>
                    </header>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist" style="margin-bottom: 20px">
                            <h1 style="margin-left: 5px; margin-right: 15px">CATEGORIES</h1>
                            <button class="nav-link active" id="nav-1rep-tab" data-bs-toggle="tab" data-bs-target="#nav-1rep" type="button" role="tab" aria-controls="nav-1rep" aria-selected="true">1 REP MAX</button>
                            <button class="nav-link" id="nav-6reps-tab" data-bs-toggle="tab" data-bs-target="#nav-6reps" type="button" role="tab" aria-controls="nav-6reps" aria-selected="false">6 REPS</button>
                            <button class="nav-link" id="nav-12reps-tab" data-bs-toggle="tab" data-bs-target="#nav-12reps" type="button" role="tab" aria-controls="nav-12reps" aria-selected="false">12 REPS</button>
                        </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent"> 
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

                <div class="tab-pane fade" id="nav-bmi" role="tabpanel" aria-labelledby="nav-bmi-tab">
                    <!-- BMI content goes here -->
                    <header class="container-fluid bg-primary text-white" style="padding: 20px; margin-bottom: 20px; margin-top: 20px">
                        <h1>BMI Tracker</h1>
                        <p class="d-none" id="hasAssessment">{{ $withAssessment }}</p>
                        <p id="date">
                            {{ DateTime::createFromFormat('!m', date('m'))->format('F'). ' '. date('d Y') }}

                        </p>
                    </header>

                    <div class="bmi-metrics-box">
                        <div class="form-group">
                        <label for="height">Height (in CM):</label>
                        <input type="number" id="height" value="170" readonly>
                        </div>
                        <div class="form-group">
                        <label for="weight">Weight (in KG):</label>
                        <input type="number" id="weight" value="65" readonly>
                        </div>
                        <div class="form-group">
                        <label for="bmi-category">BMI Category:</label>
                        <span id="bmi-category">Normal</span>
                        </div>
                        <div class="form-group">
                        <label for="bmi-value">Numeric BMI Calculation:</label>
                        <span id="bmi-value">22.5</span>
                        </div>
                        <button class="btn btn-primary" id="update-metrics-btn">Update Metrics</button>
                    </div>

                    <!-- Update Metrics Modal -->
                    <div class="modal fade" id="update-metrics-modal" tabindex="-1" aria-labelledby="update-metrics-modal-label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="update-metrics-modal-label">Update Metrics</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="new-height">Height (in CM):</label>
                                        <input type="number" id="new-height" value="170">
                                        </div>
                                        <div class="form-group">
                                        <label for="new-weight">Weight (in KG):</label>
                                        <input type="number" id="new-weight" value="65">
                                    </div>
                                </form>
                                </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary" id="save-metrics-btn">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <header class="container-fluid bg-primary text-white" style="padding: 20px; margin-bottom: 20px; margin-top: 20px">
                        <h1>Profile</h1>
                        <p class="d-none" id="hasAssessment">{{ $withAssessment }}</p>
                        <p id="date">
                            {{ DateTime::createFromFormat('!m', date('m'))->format('F') . ' ' . date('d Y') }}
                        </p>
                    </header>

                    <div class="container mt-5 profile-container">
                        <div class="profile-header text-center">
                            <img src="{{ auth()->user()->profile_image ? asset('images/' . auth()->user()->profile_image) : asset('images/blankprofile.png') }}" alt="Profile Picture" class="rounded-circle profile-picture">
                            <h4 class="profile-name">{{ optional(auth()->user()->userProfile)->firstName }} {{ optional(auth()->user()->userProfile)->lastName }}</h4>
                            <p class="profile-email">{{ auth()->user()->email }}</p>
                            <p class="profile-plan">Monthly plan</p>
                        </div>    
                        <div class="d-grid gap-2 mt-4">
                            <button id="qrCodeBtn" class="btn btn-outline-secondary" onclick="showPage('qrCodePage')">QR Code</button>
                            <button id="editProfileBtn" class="btn btn-outline-secondary" onclick="showPage('editProfilePage')">Edit Profile</button>
                            <button id="membershipDetailsBtn" class="btn btn-outline-secondary" onclick="showPage('membershipDetailsPage')">Membership Details</button>
                            <a href="{{ route('password.request') }}" id="passwordSecurityBtn" class="btn btn-outline-secondary">Password and Security</a>
                            <button id="policiesRegulationsBtn" class="btn btn-outline-secondary" onclick="showPage('policiesRegulationsPage')">Policies and Regulations</button>
                        </div>
                    </div>

                    <!-- QR Code Page -->
                    <div id="qrCodePage" class="page-content" style="display: none;">
                        <h3>QR Code</h3>
                        <div class="container text-center mt-5">
                            <div class="row mt-5 justify-content-center">
                                <div class="col-md-6">
                                    <div class="qr-code-container shadow-lg rounded">
                                        <img src="{{ route('qr',auth()->user()->id) }}" alt="QR Code" class="img-fluid qr-code-image rounded">
                                        <div class="scan-me mt-3">
                                            <i class="fa fa-mobile"></i>
                                            <span class="scan-me-text">SCAN ME</span>
                                        </div>
                                        <p class="qr-instruction mt-3">Present this QR code to the Gym Admin to check in/out</p>
                                        <button class="btn btn-secondary mt-3" onclick="showPage('profileTab')"><i class="fa fa-arrow-left"></i> Back</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Profile Page -->
                    <div id="editProfilePage" class="page-content" style="display: none;">
                        <h3>Edit Profile</h3>
                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="card shadow-lg rounded-lg" style="background-color: #f8f9fa;">
                                        <div class="card-body">
                                            <div class="text-center mb-4">
                                                <form id="profileForm" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <label for="profile_image" style="cursor: pointer;">
                                                        <img src="{{ $userProfile->profile_image ? asset('images/' . $userProfile->profile_image) : asset('images/blankprofile.png') }}" alt="Profile Image" class="rounded-circle border border-secondary shadow-sm" width="120" height="120">
                                                        <input type="file" id="profile_image" name="profile_image" accept="image/jpeg,image/png" style="display: none;" onchange="document.getElementById('profileForm').submit();">
                                                    </label>
                                                </form>
                                                <h4 class="card-title mt-3">{{ $userProfile->firstName }} {{ $userProfile->lastName }}</h4>
                                                <p class="card-text text-muted">{{ Auth::user()->email }}</p>
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
                                                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$" title="Please enter a valid email address">
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    <button class="btn btn-secondary ml-2" onclick="showPage('profileTab')"><i class="fa fa-arrow-left"></i> Back</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Membership Details Page -->
                    <div id="membershipDetailsPage" class="page-content" style="display: none;">
                        <h3>Membership Details</h3>
                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <div class="col-lg-6">
                                    <div class="card shadow text-center p-4 rounded-lg" style="background-color: #f8f9fa;">
                                        <div class="card-body">
                                            <h5 class="card-title mb-4">Current Membership Plan</h5>
                                            <div class="membership-plan mb-4">
                                                
                                            </div>
                                            <div class="mb-4">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="mb-1 font-weight-bold">Start Date:</p>
                                                       
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mb-1 font-weight-bold">Expiry Date:</p>
                                                     
                                                    </div>
                                                    <div class="col-12">
                                                        <p class="mb-1 font-weight-bold">Price:</p>
                                                        <p class="text-secondary">₱499.00</p>
                                                        <p class="text-muted small">Pricing may vary</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-secondary mt-3" onclick="showPage('profileTab')">
                                                    <i class="fa fa-arrow-left"></i> Back
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Password and Security Page -->
                    <div id="passwordSecurityPage" class="page-content" style="display: none;">
                        <h3>Password and Security</h3>
                        <p>Your password and security content goes here.</p>
                        <button class="btn btn-secondary" onclick="showPage('profileTab')">Back</button>
                    </div>

                    <!-- Policies and Regulations Page -->
                    <div id="policiesRegulationsPage" class="page-content" style="display: none;">
                        <h3>Data Privacy Notice</h3>
                        <div class="container mt-5">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="card shadow-lg p-4" style="background-color: #ffffff; border-radius: 10px; width: 100%;">
                                        <div class="card-body">
                                            <h5 class="card-title mb-4 text-center text-dark">Data Privacy Notice</h5>
                                            <div class="policies-content mb-4">
                                                <h6 class="text-uppercase text-secondary">Introduction</h6>
                                                <p>
                                                    At Stamina Fitness Centre, we value your privacy and are committed to protecting your personal data in compliance with the Data Privacy Act of 2012 (Republic Act No. 10173) of the Philippines. This Data Privacy Notice explains how we collect, use, and safeguard your personal information.
                                                </p>
                                                <h6 class="text-uppercase text-secondary mt-4">Collection of Personal Data</h6>
                                                <p>
                                                    We collect personal data that you provide to us directly through various means, including:
                                                </p>
                                                <ul>
                                                    <li>Membership registration forms, both online and offline</li>
                                                    <li>Health assessment forms</li>
                                                    <li>Event and activity registration forms</li>
                                                    <li>Communications through emails, phone calls, and face-to-face interactions</li>
                                                    <li>Payment transactions</li>
                                                </ul>
                                                <p>
                                                    The personal data we collect includes, but is not limited to:
                                                </p>
                                                <ul>
                                                    <li>Full name</li>
                                                    <li>Contact information (email address, phone number, home address)</li>
                                                    <li>Demographic information (age, gender, date of birth)</li>
                                                    <li>Health and medical information relevant to your fitness activities</li>
                                                    <li>Payment details (credit/debit card information, billing address)</li>
                                                </ul>
                                                <h6 class="text-uppercase text-secondary mt-4">Use of Personal Data</h6>
                                                <p>
                                                    Your personal data is used for the following purposes:
                                                </p>
                                                <ul>
                                                    <li>To manage your gym membership and provide you with access to our facilities and services</li>
                                                    <li>To conduct health assessments and tailor fitness programs to your needs</li>
                                                    <li>To communicate with you regarding your membership, schedules, and any updates</li>
                                                    <li>To process your payments and manage your financial transactions</li>
                                                    <li>To improve our services through internal analysis and research</li>
                                                    <li>To ensure your safety and provide first aid or emergency response if necessary</li>
                                                </ul>
                                                <h6 class="text-uppercase text-secondary mt-4">Data Security</h6>
                                                <p>
                                                    We implement appropriate technical and organizational measures to protect your personal data from unauthorized access, use, or disclosure. These measures include:
                                                </p>
                                                <ul>
                                                    <li>Secure storage of physical and digital records</li>
                                                    <li>Restricted access to your data, limited to authorized personnel only</li>
                                                    <li>Use of encryption technologies for sensitive information</li>
                                                    <li>Regular security audits and assessments</li>
                                                    <li>Training our staff on data privacy and protection practices</li>
                                                </ul>
                                                <h6 class="text-uppercase text-secondary mt-4">Sharing of Personal Data</h6>
                                                <p>
                                                    We do not share your personal data with third parties without your consent, except in the following circumstances:
                                                </p>
                                                <ul>
                                                    <li>When required by law or legal processes</li>
                                                    <li>When necessary to provide our services (e.g., sharing information with fitness instructors for personalized training)</li>
                                                    <li>When required to protect your vital interests (e.g., sharing medical information with healthcare providers in emergencies)</li>
                                                </ul>
                                                <h6 class="text-uppercase text-secondary mt-4">Retention of Personal Data</h6>
                                                <p>
                                                    We retain your personal data only for as long as necessary to fulfill the purposes for which it was collected and to comply with legal obligations. The retention period may vary depending on the type of data and the purpose for its collection.
                                                </p>
                                                <h6 class="text-uppercase text-secondary mt-4">Your Rights</h6>
                                                <p>
                                                    Under the Data Privacy Act of 2012, you have the following rights regarding your personal data:
                                                </p>
                                                <ul>
                                                    <li><strong>Right to Access:</strong> You can request access to your personal data held by us.</li>
                                                    <li><strong>Right to Rectification:</strong> You can request corrections to any inaccuracies in your personal data.</li>
                                                    <li><strong>Right to Erasure:</strong> You can request the deletion of your personal data under certain conditions.</li>
                                                    <li><strong>Right to Restrict Processing:</strong> You can request the restriction of processing your personal data under certain conditions.</li>
                                                    <li><strong>Right to Object:</strong> You can object to the processing of your personal data under certain conditions.</li>
                                                    <li><strong>Right to Data Portability:</strong> You can request the transfer of your personal data to another organization.</li>
                                                </ul>
                                                <p>
                                                    To exercise these rights, please contact us at our provided contact information. We will respond to your request within a reasonable timeframe.
                                                </p>
                                                <h6 class="text-uppercase text-secondary mt-4">Changes to the Privacy Notice</h6>
                                                <p>
                                                    We may update this Data Privacy Notice from time to time to reflect changes in our practices or for other operational, legal, or regulatory reasons. Any changes will be posted on our website and, where appropriate, notified to you via email.
                                                </p>
                                                <p class="mt-4">
                                                    If you have any questions or concerns about our Data Privacy Notice, please do not hesitate to contact us at 09234567891 or visit our customer service desk.
                                                </p>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <button class="btn btn-secondary mt-3" onclick="showPage('profileTab')">
                                                    <i class="fa fa-arrow-left"></i> Back
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

@endsection
