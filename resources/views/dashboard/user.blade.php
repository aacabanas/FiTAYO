@extends('base')
@section('title', 'Dashboard')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e3s4Wz6iJgD/+ub2oU" crossorigin="anonymous">

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

        /* Milestones styles */
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
        
    <div class="container-fluid bg-orange footer">
    <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-leaderboards-tab" data-bs-toggle="tab" data-bs-target="#nav-leaderboards" type="button" role="tab" aria-controls="nav-leaderboards" aria-selected="true">Leaderboards</button>
        <button class="nav-link" id="nav-milestones-tab" data-bs-toggle="tab" data-bs-target="#nav-milestones" type="button" role="tab" aria-controls="nav-milestones" aria-selected="false">Milestones</button>
        <button class="nav-link" id="nav-bmi-tab" data-bs-toggle="tab" data-bs-target="#nav-bmi" type="button" role="tab" aria-controls="nav-bmi" aria-selected="false">My BMI</button>
        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
    </div>
</nav>

<!-- Tab content -->
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-leaderboards" role="tabpanel" aria-labelledby="nav-leaderboards-tab">
        <!-- Leaderboards content goes here -->
        <header class="container-fluid bg-primary text-white" style="padding: 20px; margin-bottom: 20px; margin-top: 20px">
            <h1>Leaderboards</h1>
            <p class="d-none" id="hasAssessment">{{ $withAssessment }}</p>
            <p id="date">
                {{ DateTime::createFromFormat('!m', date('m'))->format('F'). ' '. date('d Y') }}

            </p>
        </header>
        <div class="container">
            <div class="row">
            <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">This week's leaderboards!</h5>
                        </div>
                        <div class="card-body">
                            <div class="dropdown mb-3">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="leaderboardDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Select a lift
                                </button>
                                <div class="dropdown-menu" aria-labelledby="leaderboardDropdown">
                                    <a class="dropdown-item" href="#" type='fitayo-exercise' data-lift="benchpress">Benchpress</a>
                                    <a class="dropdown-item" href="#" type='fitayo-exercise' data-lift="deadlift">Deadlift</a>
                                    <a class="dropdown-item" href="#" type='fitayo-exercise' data-lift="barbell-squats">Barbell Squats</a>
                                </div>
                            </div>

                            <h5 id="selectedLiftHeader" class="mb-3" style="display: none;"></h5>

                            <div class="category-box mb-4" id="1RepMaxTable" style="display: none;">
                                <h6>1 REP MAX</h6>
                                <table class="table mb-3 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Weight (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table1RepMax">
                                        <!-- Table rows will be added here -->
                                    </tbody>
                                </table>
                            </div>

                            <!-- Placeholder for 6 REPS table -->
                            <div class="category-box mb-4" id="6RepsTable" style="display: none;">
                                <h6>6 REPS</h6>
                                <table class="table mb-3 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Weight (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table6Reps">
                                        <!-- Table rows will be added here -->
                                    </tbody>
                                </table>
                            </div>

                            <!-- Placeholder for 12 REPS table -->
                            <div class="category-box mb-4" id="12RepsTable" style="display: none;">
                                <h6>12 REPS</h6>
                                <table class="table mb-3 table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Ranking</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Weight (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table12Reps">
                                        <!-- Table rows will be added here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
        <!-- Profile content goes here -->
        <h2>Profile</h2>
        <p>This is the profile tab.</p>
    </div>
</div>

</body>

</html>
@endsection
