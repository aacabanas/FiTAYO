@extends('base')
@section('title', 'Dashboard')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <style>
    .container-fluid {
        padding: 10px 20px;
        margin-bottom: 20px;
    }

    .bg-primary {
        background-color: #007bff;
    }

    .text-white {
        color: white;
    }

    h1 {
        font-size: 2em;
        font-weight: bold;
    }

    #date {
        font-size: 1.2em;
    }

    .profile-section {
        margin-top: 20px;
    }

    .profile-header {
        background-color: #0d6efd;
        padding: 20px;
        border-bottom: 1px solid #dee2e6;
        border-radius: 0.25rem 0.25rem 0 0;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        color: white;
    }

    .profile-picture {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border: 3px solid #007bff;
        margin-bottom: 15px;
    }

    .profile-plan {
        font-size: 1.2em;
        color: white;
        margin-top: 15px;
    }

    .profile-plan {
        font-size: 1.5em;
        color: white;
        margin-top: 15px;
    }

    .profile-email {
        font-size: 1em;
        color: white;
        margin-top: 5px;
    }

    .profile-body {
        padding: 20px;
        background-color: #ffffff;
        border: 1px solid #dee2e6;
        border-radius: 0 0 0.25rem 0.25rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .profile-button {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 15px;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
        background-color: #f8f9fa;
        text-decoration: none;
        color: #212529;
        transition: background-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        width: 100%;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .profile-button:hover {
        background-color: #e9ecef;
        color: #212529;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .profile-button i {
        margin-right: 10px;
        font-size: 1.2em;
    }

    .profile-button-text {
        margin-left: 10px;
        font-size: 1.1em;
        font-weight: bold;
    }

    @media (min-width: 768px) {
        .profile-button {
            height: 60px;
        }
    }

    @media (max-width: 600px) {
        .container-fluid {
            padding: 10px;
        }

        h1 {
            font-size: 1.2em;
        }

        #date {
            font-size: 1em;
        }
    }

    .progress-text-indicators {
        position: relative;
        top: 8px;
        font-size: 12px;
        color: #666;
        padding-right: 20px;
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
        border-radius: 10px;
        height: 180px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
    <header class="container-fluid bg-primary text-white py-4 mb-4 mt-4 rounded shadow">
        <h1 class="display-4">Leaderboards</h1>
        <p class="d-none" id="hasAssessment">{{ $withAssessment }}</p>
        <p id="date">
            {{ DateTime::createFromFormat('!m', date('m'))->format('F'). ' '. date('d Y') }}
        </p>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">This week's leaderboards!</h5>
                    </div>
                    <div class="card-body">
                        <div class="dropdown mb-3">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="leaderboardDropdown" data-bs-toggle="dropdown" aria-expanded="false">
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
                            <h6 class="text-primary">1 REP MAX</h6>
                            <table class="table table-hover table-bordered">
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

                        <div class="category-box mb-4" id="6RepsTable" style="display: none;">
                            <h6 class="text-primary">6 REPS</h6>
                            <table class="table table-hover table-bordered">
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

                        <div class="category-box mb-4" id="12RepsTable" style="display: none;">
                            <h6 class="text-primary">12 REPS</h6>
                            <table class="table table-hover table-bordered">
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
    <header class="container-fluid bg-primary text-white py-4 mb-4 mt-4 rounded shadow">
        <h1 class="display-4">Milestones</h1>
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
                <div class="box shadow-sm rounded mb-4">
                    <h3 class="text-primary">BENCH PRESS</h3>
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
                            <span style="left: 99%;">100KG</span>
                        </div>
                        <div class="progbtn mt-3">
                            <button class="btn btn-danger mt-2" onclick="slackOff('benchPress1RM')">I slacked off</button>
                            <button class="btn btn-success mt-2 float-end" onclick="advanceProgress('benchPress1RM')">Advance Progress</button>
                        </div>
                    </div>
                </div>
                <div class="box shadow-sm rounded mb-4">
                    <h3 class="text-primary">DEADLIFT</h3>
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
                            <span style="left: 99%;">100KG</span>
                        </div>
                        <div class="progbtn mt-3">
                            <button class="btn btn-danger mt-2" onclick="slackOff('deadlift1RM')">I slacked off</button>
                            <button class="btn btn-success mt-2 float-end" onclick="advanceProgress('deadlift1RM')">Advance Progress</button>
                        </div>
                    </div>
                </div>
                <div class="box shadow-sm rounded mb-4">
                    <h3 class="text-primary">BARBELL SQUATS</h3>
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
                            <span style="left: 99%;">100KG</span>
                        </div>
                        <div class="progbtn mt-3">
                            <button class="btn btn-danger mt-2" onclick="slackOff('barbellSquats1RM')">I slacked off</button>
                            <button class="btn btn-success mt-2 float-end" onclick="advanceProgress('barbellSquats1RM')">Advance Progress</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="nav-6reps" role="tabpanel" aria-labelledby="nav-6reps">
            <div class="row">
                <div class="box shadow-sm rounded mb-4">
                    <h3 class="text-primary">BENCH PRESS</h3>
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
                            <span style="left: 99%;">100KG</span>
                        </div>
                        <div class="progbtn mt-3">
                            <button class="btn btn-danger mt-2" onclick="slackOff('benchPress6RM')">I slacked off</button>
                            <button class="btn btn-success mt-2 float-end" onclick="advanceProgress('benchPress6RM')">Advance Progress</button>
                        </div>
                    </div>
                </div>
                <div class="box shadow-sm rounded mb-4">
                    <h3 class="text-primary">DEADLIFT</h3>
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
                            <span style="left: 99%;">100KG</span>
                        </div>
                        <div class="progbtn mt-3">
                            <button class="btn btn-danger mt-2" onclick="slackOff('deadlift6RM')">I slacked off</button>
                            <button class="btn btn-success mt-2 float-end" onclick="advanceProgress('deadlift6RM')">Advance Progress</button>
                        </div>
                    </div>
                </div>
                <div class="box shadow-sm rounded mb-4">
                    <h3 class="text-primary">BARBELL SQUATS</h3>
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
                            <span style="left: 99%;">100KG</span>
                        </div>
                        <div class="progbtn mt-3">
                            <button class="btn btn-danger mt-2" onclick="slackOff('barbellSquats6RM')">I slacked off</button>
                            <button class="btn btn-success mt-2 float-end" onclick="advanceProgress('barbellSquats6RM')">Advance Progress</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="nav-12reps" role="tabpanel" aria-labelledby="nav-12reps">
            <div class="row">
                <div class="box shadow-sm rounded mb-4">
                    <h3 class="text-primary">BENCH PRESS</h3>
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
                            <span style="left: 99%;">100KG</span>
                        </div>
                        <div class="progbtn mt-3">
                            <button class="btn btn-danger mt-2" onclick="slackOff('benchPress12RM')">I slacked off</button>
                            <button class="btn btn-success mt-2 float-end" onclick="advanceProgress('benchPress12RM')">Advance Progress</button>
                        </div>
                    </div>
                </div>
                <div class="box shadow-sm rounded mb-4">
                    <h3 class="text-primary">DEADLIFT</h3>
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
                            <span style="left: 99%;">100KG</span>
                        </div>
                        <div class="progbtn mt-3">
                            <button class="btn btn-danger mt-2" onclick="slackOff('deadlift12RM')">I slacked off</button>
                            <button class="btn btn-success mt-2 float-end" onclick="advanceProgress('deadlift12RM')">Advance Progress</button>
                        </div>
                    </div>
                </div>
                <div class="box shadow-sm rounded mb-4">
                    <h3 class="text-primary">BARBELL SQUATS</h3>
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
                            <span style="left: 99%;">100KG</span>
                        </div>
                        <div class="progbtn mt-3">
                            <button class="btn btn-danger mt-2" onclick="slackOff('barbellSquats12RM')">I slacked off</button>
                            <button class="btn btn-success mt-2 float-end" onclick="advanceProgress('barbellSquats12RM')">Advance Progress</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="tab-pane fade" id="nav-bmi" role="tabpanel" aria-labelledby="nav-bmi-tab">
    <!-- BMI content goes here -->
    <header class="container-fluid bg-primary text-white py-4 mb-4 mt-4 rounded shadow">
        <h1 class="display-4">BMI Tracker</h1>
        <p class="d-none" id="hasAssessment">{{ $withAssessment }}</p>
        <p id="date">
            {{ DateTime::createFromFormat('!m', date('m'))->format('F'). ' '. date('d Y') }}
        </p>
    </header>
    @if ($assessment)
    <div class="row
        @if ($assessment->bmi_classification == 'Underweight') bg-secondary
        @elseif ($assessment->bmi_classification == 'Normal')
            bg-primary
        @elseif ($assessment->bmi_classification == 'Overweight')
            bg-warning
        @else
            bg-danger @endif
        text-white p-3 rounded shadow">
        <div class="col">Height: {{ $assessment->height }} inches</div>
        <div class="col">Weight: {{ $assessment->weight }} lbs</div>
        <div class="col">BMI: {{ $assessment->bmi }}</div>
        <div class="col">BMI Type: {{ $assessment->bmi_classification }}</div>
    </div>
    @else
    <div class="row text-center text-muted">
        <div class="col">No BMI assessment available.</div>
    </div>
    @endif
    <br>
    <div class="bmi-metrics-box shadow-sm rounded p-4 mb-4">
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
        <button class="btn btn-primary btn-lg w-100" id="update-metrics-btn">Update Metrics</button>
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
                            <input type="number" id="new-height" class="form-control" value="170">
                        </div>
                        <div class="form-group">
                            <label for="new-weight">Weight (in KG):</label>
                            <input type="number" id="new-weight" class="form-control" value="65">
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


            <div class="tab-pane profile-section" id="nav-profile" role="tabpanel" aria-labelledby="navprofile">
                <div class="profile-header text-center">
                    <img src="{{ auth()->user()->profile_image ? asset('images/' . auth()->user()->profile_image) : asset('images/blankprofile.png') }}"
                        alt="Profile Picture" class="rounded-circle profile-picture">
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
                        <!-- Form content goes here -->
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

                        <div class="row">
                            <div class="col-12 mb-3">
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
