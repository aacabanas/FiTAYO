@extends('base')
@section('title', 'Dashboard')
@section('content')



        <div class="container-fluid bg-orange footer">
            <header class="container-fluid bg-primary text-white" style="padding: 20px; margin-bottom: 20px; margin-top: 20px">
                <h1 id="title">Leaderboards</h1>
                <p class="d-none" id="hasAssessment">{{ $withAssessment }}</p>
                <p id="date">
                    {{ DateTime::createFromFormat('!m', date('m'))->format('F'). ' '. date('d Y') }}

                </p>
            </header>
            
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
                    <div id="nav-bench" class="tab-pane fade show active">
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

                    <div id="nav-deadlift" class="tab-pane fade">
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

                    <div id="nav-squats" class="tab-pane fade">
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
                            
                </div>

                <div class="tab-pane fade" id="nav-milestones" role="tabpanel" aria-labelledby="nav-milestones-tab">
                    

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
                    <div class="container mt-5">    
                        <div class="d-grid gap-2">
                            
                        </div>
                    </div>

                    <!-- QR Code Page -->
                    <div id="qrCodePage" class="page-content" style="display: none;">
                        <h3>QR Code</h3>
                        <p>Your QR Code content goes here.</p>
                        <button class="btn btn-secondary" onclick="showPage('profileTab')">Back</button>
                    </div>

                    <!-- Edit Profile Page -->
                    <div id="editProfilePage" class="page-content" style="display: none;">
                        <h3>Edit Profile</h3>
                        <p>Edit your profile content goes here.</p>
                        <button class="btn btn-secondary" onclick="showPage('profileTab')">Back</button>
                    </div>

                    <!-- Membership Details Page -->
                    <div id="membershipDetailsPage" class="page-content" style="display: none;">
                        <h3>Membership Details</h3>
                        <p>Your membership details content goes here.</p>
                        <button class="btn btn-secondary" onclick="showPage('profileTab')">Back</button>
                    </div>

                    <!-- Password and Security Page -->
                    <div id="passwordSecurityPage" class="page-content" style="display: none;">
                        <h3>Password and Security</h3>
                        <p>Your password and security content goes here.</p>
                        <button class="btn btn-secondary" onclick="showPage('profileTab')">Back</button>
                    </div>

                    <!-- Policies and Regulations Page -->
                    <div id="policiesRegulationsPage" class="page-content" style="display: none;">
                        <h3>Policies and Regulations</h3>
                        <p>Your policies and regulations content goes here.</p>
                        <button class="btn btn-secondary" onclick="showPage('profileTab')">Back</button>
                    </div>
                </div>
            </div>
            <style>
                .container {
        max-width: 800px;
    }

    .card {
        background-color: #f8f9fa;
        border: none;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .card-body {
        padding: 40px;
    }

    .form-group {
        margin-bottom: 15px;
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

    .rounded-circle {
        cursor: pointer;
        object-fit: cover;
    }

    .shadow-sm {
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    .border-secondary {
        border-color: #dee2e6 !important;
    }

    .text-muted {
        color: #6c757d !important;
    }

    .mt-3 {
        margin-top: 1rem !important;
    }

    .ml-2 {
        margin-left: 0.5rem !important;
    }
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
                .navbar-nav {
               display: flex;
               justify-content: center;
               }
   
               .nav-link.active {
               font-weight: bold; /* Make active link bold */
               }
   
               .nav-link:hover,
               .nav-link:focus {
                   color: rgba(255, 255, 255, 0.75); /* Lighten the text color on hover/focus */
                   text-decoration: none; /* Remove underline on hover/focus */
               }
   
               /* Base styles */
               .container-fluid {
                   padding: 10px;
                   margin-bottom: 20px;
               }
   
               .card-body {
                   display: flex;
                   justify-content: center;
                   align-items: center;
                   height: 30vh;
                   max-width: 800px; 
                   margin: 0 auto; 
                   padding: 0 15px; 
               }
   
               .bg-primary {
                   background-color: #007bff;
                   /* Bootstrap primary color */
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
   
               /* Milestones styles */
               .box {
                   background-color: #FEFBF6;
                   margin-bottom: 10px;
                   padding: 15px;
                   border: 1px solid #ddd;
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
   
               /* Profile */
               .profile-content,
               .page-content {
                   display: none;
               }
   
               .active-content {
                   display: block;
               }
           </style>
        </div>


@endsection
