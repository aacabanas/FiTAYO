@extends('base')
@section('title', 'Dashboard')
@section('content')



    <!-- Dark Mode Toggle Switch -->
    <header class="container-fluid bg-primary text-white py-3 mb-4 mt-3 shadow-sm rounded">
        <div class="row align-items-center">
            <div class="col-8 col-md-9">
                <h1 id="title" class="mb-0 display-4" style="font-weight: bold;">Home</h1>
            </div>
            <div class="col-4 col-md-3 text-end">
                <div class="toggle-container d-inline-flex align-items-center">
                    <label class="switch mb-0">
                        <input type="checkbox" id="darkModeToggle">
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <p id="date" class="mb-0 fs-5">
                    {{ DateTime::createFromFormat('!m', date('m'))->format('F') . ' ' . date('d Y') }}
                </p>
            </div>
        </div>
    </header>


    <div class="container-fluid bg-orange footer">
        <nav class="navbar navbar-expand navbar-dark bg-primary text-white fixed-bottom">
            <ul class="navbar-nav nav justified w-100" id="nav-bot">
                <li class="nav-item">
                    <a href="#" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        class="nav-link active" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" id="nav-leaderboards-tab" data-bs-toggle="tab" data-bs-target="#nav-leaderboards"
                        class="nav-link" role="tab" aria-controls="nav-leaderboards"
                        aria-selected="false">Leaderboards</a>
                </li>
                <li class="nav-item">
                    <a href="#" id="nav-milestones-tab" data-bs-toggle="tab" data-bs-target="#nav-milestones"
                        class="nav-link" role="tab" aria-controls="nav-milestones" aria-selected="false">Milestones</a>
                </li>
                <li class="nav-item">
                    <a href="#" id="nav-bmi-tab" data-bs-toggle="tab" data-bs-target="#nav-bmi" class="nav-link"
                        role="tab" aria-controls="nav-bmi" aria-selected="false">My BMI</a>
                </li>
                <li class="nav-item">
                    <a href="#" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        class="nav-link" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                </li>
            </ul>
        </nav>

        <!-- Tab content -->
        <div class="tab-content" id="nav-tabContent">
            <!-- Home Tab -->
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="container mt-5 profile-container">
                    <!-- Combined Sections -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <!-- Welcome Message -->
                            <div class="text-center mb-4">
                                <h2>Welcome Back, {{ auth()->user()->username }}!</h2>
                                <p>Let's make today a great workout day!</p>
                            </div>
                            <hr>

                            <!-- Recent Activity -->
                            <h3 class="card-title d-flex justify-content-between align-items-center">
                                <span>Recent Activity</span>
                                <i id="recentActivityChevron" class="fas fa-chevron-right ms-2" style="cursor:pointer;"
                                    data-bs-toggle="collapse" data-bs-target="#recentActivityDetails"></i>
                            </h3>
                            <table class="table table-striped table-dark-mode">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Activity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>June 25, 2024</td>
                                        <td>Completed Deadlift - 2 sets of 8 reps with 30kg and Squats - 3 sets of 10 reps
                                            with 40kg</td>
                                    </tr>
                                    <tr>
                                        <td>June 23, 2024</td>
                                        <td>Completed Bench Press - 3 sets of 8 reps with 20kg and Deadlift - 2 sets of 8
                                            reps with 30kg</td>
                                    </tr>
                                    <tr>
                                        <td>June 21, 2024</td>
                                        <td>Completed Deadlift - 2 sets of 8 reps with 30kg and Squats - 3 sets of 10 reps
                                            with 40kg</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div id="recentActivityDetails" class="collapse">
                                <table class="table table-striped table-dark-mode">
                                    <tbody>
                                        <tr>
                                            <td>June 19, 2024</td>
                                            <td>Completed Bench Press - 3 sets of 8 reps with 20kg and Squats - 3 sets of 10
                                                reps with 40kg</td>
                                        </tr>
                                        <tr>
                                            <td>June 17, 2024</td>
                                            <td>Completed Deadlift - 2 sets of 8 reps with 30kg and Bench Press - 3 sets of
                                                8 reps with 20kg</td>
                                        </tr>
                                        <tr>
                                            <td>June 15, 2024</td>
                                            <td>Completed Bench Press - 3 sets of 8 reps with 20kg and Deadlift - 2 sets of
                                                8 reps with 30kg</td>
                                        </tr>
                                        <tr>
                                            <td>June 13, 2024</td>
                                            <td>Completed Deadlift - 2 sets of 8 reps with 30kg and Squats - 3 sets of 10
                                                reps with 40kg</td>
                                        </tr>
                                        <tr>
                                            <td>June 11, 2024</td>
                                            <td>Completed Bench Press - 3 sets of 8 reps with 20kg and Squats - 3 sets of 10
                                                reps with 40kg</td>
                                        </tr>
                                        <tr>
                                            <td>June 9, 2024</td>
                                            <td>Completed Deadlift - 2 sets of 8 reps with 30kg and Bench Press - 3 sets of
                                                8 reps with 20kg</td>
                                        </tr>
                                        <tr>
                                            <td>June 7, 2024</td>
                                            <td>Completed Bench Press - 3 sets of 8 reps with 20kg and Squats - 3 sets of 10
                                                reps with 40kg</td>
                                        </tr>
                                        <tr>
                                            <td>June 5, 2024</td>
                                            <td>Completed Deadlift - 2 sets of 8 reps with 30kg and Squats - 3 sets of 10
                                                reps with 40kg</td>
                                        </tr>
                                        <tr>
                                            <td>June 3, 2024</td>
                                            <td>Attended Beginner Yoga Class</td>
                                        </tr>
                                        <tr>
                                            <td>June 2, 2024</td>
                                            <td>Completed Deadlift - 2 sets of 8 reps with 30kg and Bench Press - 3 sets of
                                                8 reps with 20kg</td>
                                        </tr>
                                        <tr>
                                            <td>June 1, 2024</td>
                                            <td>Completed Bench Press - 3 sets of 8 reps with 20kg and Squats - 3 sets of 10
                                                reps with 40kg</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr>

                            <!-- Attendance Section -->
                            <h3 class="card-title d-flex justify-content-between align-items-center">
                                <span class="ms-3">Gym Visits this month</span>
                                <div class="d-flex align-items-center ms-auto">
                                    <span class="badge bg-primary ms-2"
                                        id="attendanceCount">{{ \App\Models\checkins::where('username', auth()->user()->username)->count() }}</span>
                                    <i id="attendanceChevron" class="fas fa-chevron-right ms-2" style="cursor:pointer;"
                                        data-bs-toggle="collapse" data-bs-target="#visitHistory"></i>
                                </div>
                            </h3>
                            <p class="text-left ms-3">Tap to view your full visit history</p>
                            <div id="visitHistory" class="collapse">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Check-in Time</th>
                                            <th>Check-out Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (\App\Models\checkins::where('username', auth()->user()->username)->get() as $visit)
                                            <tr>
                                                <td>{{ $visit->date }}</td>
                                                <td>{{ $visit->time_in }}</td>
                                                <td>{{ $visit->time_out == null ? 'N/A' : $visit->time_out }}</td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                            <hr>

                            <div class="row">
                                <!-- Today's Workout Plan -->
                                <div class="col-lg-6 col-md-12">
                                    <div class="card shadow-sm mb-4">
                                        <div class="card-body">
                                            <h3 class="card-title">Today's Workout Plan</h3>
                                            <canvas id="workoutPlanChart"></canvas>
                                            <div id="chartInsights" class="mt-3"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Progress Overview with Charts -->
                                <div class="col-lg-6 col-md-12">
                                    <div class="card shadow-sm mb-4">
                                        <div class="card-body">
                                            <h3 class="card-title">Progress Overview</h3>
                                            <canvas id="progressChart"></canvas>
                                            <div id="progressInsights" class="mt-3"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Upcoming Events/Classes -->
                                <div class="col-lg-6 col-md-12">
                                    <div class="card shadow-sm mb-4">
                                        <div class="card-body">
                                            <h3 class="card-title">Upcoming Events/Classes</h3>
                                            <div id="calendar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Goals and Challenges -->
                            <div class="container mt-5">
                                <div class="card shadow-sm mb-4">
                                    <div class="card-body text-center">
                                        <h3 class="card-title text-center">Goals and Challenges</h3>
                                        <p class="text-center"><strong>Current Goal:</strong> Assigned by Trainer - Lose
                                            2kg by the end of July.</p>
                                        <p class="text-center"><strong>Challenge:</strong> Participate in the 15-day
                                            beginner squat challenge (starting with 10 squats per day).</p>
                                    </div>
                                </div>

                                <!-- Trainer's Corner & Gym News -->
                                <div class="card shadow-sm mb-4">
                                    <div class="card-body text-center">
                                        <h3 class="card-title text-center">Trainer's Corner & Gym News</h3>
                                        <hr>
                                        <div class="text-center">
                                            <h4>Trainer's Corner</h4>
                                            <p>Message from your trainer: <em>"Keep pushing yourself and stay consistent.
                                                    You're doing great!"</em></p>
                                            <p>Watch this tutorial on proper deadlift form:</p>
                                            <a href="https://www.youtube.com/watch?v=r4MzxtBKyNE" class="btn btn-primary"
                                                target="_self">Watch Video</a>
                                        </div>
                                        <hr>
                                        <div class="text-center">
                                            <h4>Gym News and Updates</h4>
                                            <p>We're excited to announce the arrival of new state-of-the-art equipment in
                                                the gym!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal for event details -->
                            <div class="modal fade" id="eventDetailsModal" tabindex="-1"
                                aria-labelledby="eventDetailsModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="eventDetailsModalLabel">Event Details</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p id="eventTitle"></p>
                                            <p id="eventTime"></p>
                                            <p id="eventDescription"></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of event details modal -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of home tab -->

            <!-- Leaderboards Tab -->
            <div class="tab-pane fade" id="nav-leaderboards" role="tabpanel" aria-labelledby="nav-leaderboards-tab">
                <!-- Leaderboards content goes here -->
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist" style="margin-bottom: 20px">
                        <h1 style="margin-left: 5px; margin-right: 15px">LIFTS</h1>
                        <button class="nav-link active" id="nav-bench-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-bench" type="button" role="tab" aria-controls="nav-bench"
                            aria-selected="true">BENCH PRESS</button>
                        <button class="nav-link" id="nav-deadlift-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-deadlift" type="button" role="tab" aria-controls="nav-deadlift"
                            aria-selected="false">DEADLIFT</button>
                        <button class="nav-link" id="nav-squats-tab" data-bs-toggle="tab" data-bs-target="#nav-squats"
                            type="button" role="tab" aria-controls="nav-squats"
                            aria-selected="false">SQUATS</button>
                    </div>
                </nav>

                <!-- Tables for each category -->

                <div class="tab-content">
                    <div id="nav-bench" class="tab-pane fade show active" role="tabpanel"
                        aria-labelledby="nav-bench-tab">
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
                                <tbody id="1bp">
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
                                <tbody id="6bp">
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
                                <tbody id="12bp">
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
                                <tbody id="1dl">
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
                                <tbody id="6dl">
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
                                <tbody id="12dl">
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
                                <tbody id="1bs">
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
                                <tbody id="6bs">
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
                                <tbody id="12bs">
                                    <!-- Table rows will be populated dynamically -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>


            <!-- Milestones tab and content goes here -->
            <div class="tab-pane fade" id="nav-milestones" role="tabpanel" aria-labelledby="nav-milestones-tab">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist" style="margin-bottom: 20px">
                        <h1 class="text-primary" style="margin-left: 5px; margin-right: 15px; font-weight: bold;">
                            CATEGORIES</h1>
                        <button class="nav-link active text-primary" id="nav-1rep-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-1rep" type="button" role="tab" aria-controls="nav-1rep"
                            aria-selected="true">1 REP MAX</button>
                        <button class="nav-link text-primary" id="nav-6reps-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-6reps" type="button" role="tab" aria-controls="nav-6reps"
                            aria-selected="false">6 REPS</button>
                        <button class="nav-link text-primary" id="nav-12reps-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-12reps" type="button" role="tab" aria-controls="nav-12reps"
                            aria-selected="false">12 REPS</button>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-1rep" role="tabpanel"
                        aria-labelledby="nav-1rep-tab">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h3 class="card-title text-center">BENCH PRESS</h3>
                                        <div class="progress-container ml-5 mb-3">
                                            <div class="progress h-30">
                                                <div class="progress-bar bg-info" type="progressbar" id="1bp"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: {{ \App\Models\user_milestones::where('reps', '1')->where('lift', 'Bench Press')->where('username', auth()->user()->username)->get()->first()->weight }}%">
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                @for ($i = 0; $i < 6; $i++)
                                                    <div id="1bp{{ $i * 20 }}">{{ $i * 20 }}KG</div>
                                                @endfor

                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <button
                                                class="btn btn-danger
                                            {{ \App\Models\user_milestones::where('reps', '1')->where('lift', 'Bench Press')->where('username', auth()->user()->username)->get()->first()->weight == 0? 'disabled': '' }}
                                            "
                                                type='mst' mode="lazy" reps="1" lift="Bench Press">I
                                                Slacked Off</button>
                                            <button
                                                class="btn btn-success
                                            {{ \App\Models\user_milestones::where('reps', '1')->where('lift', 'Bench Press')->where('username', auth()->user()->username)->get()->first()->weight == 100? 'disabled': '' }}
                                            "
                                                type='mst' mode="work" reps="1" lift="Bench Press">Advance
                                                Progress</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h3 class="card-title text-center">DEADLIFT</h3>
                                        <div class="progress-container ml-5 mb-3">
                                            <div class="progress h-30">
                                                <div class="progress-bar bg-info" type="progressbar" id="1dl"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: {{ \App\Models\user_milestones::where('reps', '1')->where('lift', 'Deadlift')->where('username', auth()->user()->username)->get()->first()->weight }}%">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                @for ($i = 0; $i < 6; $i++)
                                                    <div id="1dl{{ $i * 20 }}">{{ $i * 20 }}KG</div>
                                                @endfor

                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <button
                                                class="btn btn-danger
                                            {{ \App\Models\user_milestones::where('reps', '1')->where('lift', 'Deadlift')->where('username', auth()->user()->username)->get()->first()->weight == 0? 'disabled': '' }}
                                            
                                            "
                                                type='mst' mode="lazy" lift="Deadlift" reps="1">I Slacked
                                                Off</button>
                                            <button
                                                class="btn btn-success
                                           {{ \App\Models\user_milestones::where('reps', '1')->where('lift', 'Deadlift')->where('username', auth()->user()->username)->get()->first()->weight == 100? 'disabled': '' }}
                                            "
                                                type='mst' mode="work" lift="Deadlift" reps="1">Advance
                                                Progress</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h3 class="card-title text-center">BARBELL SQUATS</h3>
                                        <div class="progress-container ml-5 mb-3">
                                            <div class="progress h-30">
                                                <div class="progress-bar bg-info" type="progressbar" id="1bs"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: {{ \App\Models\user_milestones::where('reps', '1')->where('lift', 'Barbell Squats')->where('username', auth()->user()->username)->get()->first()->weight }}%">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                @for ($i = 0; $i < 6; $i++)
                                                    <div id="1bs{{ $i * 20 }}">{{ $i * 20 }}KG</div>
                                                @endfor

                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <button
                                                class="btn btn-danger
                                            {{ \App\Models\user_milestones::where('reps', '1')->where('lift', 'Barbell Squats')->where('username', auth()->user()->username)->get()->first()->weight == 0? 'disabled': '' }}
                                            
                                            "
                                                type='mst' mode="lazy" lift="Barbell Squats" reps="1">I
                                                Slacked Off</button>
                                            <button
                                                class="btn btn-success
                                            {{ \App\Models\user_milestones::where('reps', '1')->where('lift', 'Barbell Squats')->where('username', auth()->user()->username)->get()->first()->weight == 100? 'disabled': '' }}
                                            
                                            "
                                                type='mst' mode="work" lift="Barbell Squats"
                                                reps="1">Advance Progress</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-6reps" role="tabpanel" aria-labelledby="nav-6reps-tab">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h3 class="card-title text-center">BENCH PRESS</h3>
                                        <div class="progress-container ml-5 mb-3">
                                            <div class="progress h-30">
                                                <div class="progress-bar bg-info" type="progressbar" id="6bp"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                                    style="width:{{ \App\Models\user_milestones::where('reps', '6')->where('lift', 'Bench Press')->where('username', auth()->user()->username)->get()->first()->weight }}">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                @for ($i = 0; $i < 6; $i++)
                                                    <div id="6bp{{ $i * 20 }}">{{ $i * 20 }}KG</div>
                                                @endfor

                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <button
                                                class="btn btn-danger
                                             {{ \App\Models\user_milestones::where('reps', '6')->where('lift', 'Bench Press')->where('username', auth()->user()->username)->get()->first()->weight == 0? 'disabled': '' }}
                                            "
                                                type='mst' mode="lazy" lift="Bench Press" reps="6">I
                                                Slacked Off</button>
                                            <button
                                                class="btn btn-success
                                             {{ \App\Models\user_milestones::where('reps', '6')->where('lift', 'Bench Press')->where('username', auth()->user()->username)->get()->first()->weight == 100? 'disabled': '' }}
                                            "
                                                type='mst' mode="work" lift="Bench Press" reps="6">Advance
                                                Progress</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h3 class="card-title text-center">DEADLIFT</h3>
                                        <div class="progress-container ml-5 mb-3">
                                            <div class="progress h-30">
                                                <div class="progress-bar bg-info" type="progressbar" id="6dl"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                                    style=" width:{{ \App\Models\user_milestones::where('reps', '6')->where('lift', 'Deadlift')->where('username', auth()->user()->username)->get()->first()->weight }}%">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                @for ($i = 0; $i < 6; $i++)
                                                    <div id="6dl{{ $i * 20 }}">{{ $i * 20 }}KG</div>
                                                @endfor

                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <button
                                                class="btn btn-danger
                                             {{ \App\Models\user_milestones::where('reps', '6')->where('lift', 'Deadlift')->where('username', auth()->user()->username)->get()->first()->weight == 0? 'disabled': '' }}
                                            "
                                                type='mst' mode="lazy" lift="Deadlift" reps="6">I Slacked
                                                Off</button>
                                            <button
                                                class="btn btn-success
                                            {{ \App\Models\user_milestones::where('reps', '6')->where('lift', 'Deadlift')->where('username', auth()->user()->username)->get()->first()->weight == 100? 'disabled': '' }}
                                            "
                                                type='mst' mode="work" lift="Deadlift" reps="6">Advance
                                                Progress</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h3 class="card-title text-center">BARBELL SQUATS</h3>
                                        <div class="progress-container ml-5 mb-3">
                                            <div class="progress h-30">
                                                <div class="progress-bar bg-info" type="progressbar" id="6bs"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: {{ \App\Models\user_milestones::where('reps', '6')->where('lift', 'Barbell Squats')->where('username', auth()->user()->username)->get()->first()->weight }}%">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                @for ($i = 0; $i < 6; $i++)
                                                    <div id="6bs{{ $i * 20 }}">{{ $i * 20 }}KG</div>
                                                @endfor

                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <button
                                                class="btn btn-danger
                                            {{ \App\Models\user_milestones::where('reps', '6')->where('lift', 'Barbell Squats')->where('username', auth()->user()->username)->get()->first()->weight == 0? 'disabled': '' }}
                                            "
                                                type='mst' mode="lazy" lift="Barbell Squats" reps="6">I
                                                Slacked Off</button>
                                            <button
                                                class="btn btn-success
                                            {{ \App\Models\user_milestones::where('reps', '6')->where('lift', 'Barbell Squats')->where('username', auth()->user()->username)->get()->first()->weight == 100? 'disabled': '' }}
                                            "
                                                type='mst' mode="work" lift="Barbell Squats"
                                                reps="6">Advance Progress</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-12reps" role="tabpanel" aria-labelledby="nav-12reps-tab">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h3 class="card-title text-center">BENCH PRESS</h3>
                                        <div class="progress-container ml-5 mb-3">
                                            <div class="progress h-30">
                                                <div class="progress-bar bg-info" type="progressbar" id="12bp"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: {{ \App\Models\user_milestones::where('reps', '12')->where('lift', 'Bench Press')->where('username', auth()->user()->username)->get()->first()->weight }}%">
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between mt-2">
                                                @for ($i = 0; $i < 6; $i++)
                                                    <div id="12bp{{ $i * 20 }}">{{ $i * 20 }}KG</div>
                                                @endfor

                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <button
                                                class="btn btn-danger
                                            {{ \App\Models\user_milestones::where('reps', '12')->where('lift', 'Bench Press')->where('username', auth()->user()->username)->get()->first()->weight == 0? 'disabled': '' }}
                                            "
                                                type='mst' mode="lazy" lift="Bench Press" reps="12">I
                                                Slacked Off</button>
                                            <button
                                                class="btn btn-success
                                            {{ \App\Models\user_milestones::where('reps', '12')->where('lift', 'Bench Press')->where('username', auth()->user()->username)->get()->first()->weight == 100? 'disabled': '' }}
                                            
                                            "
                                                type='mst' mode="work" lift="Bench Press" reps="12">Advance
                                                Progress</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h3 class="card-title text-center">DEADLIFT</h3>
                                        <div class="progress-container ml-5 mb-3">
                                            <div class="progress h-30">
                                                <div class="progress-bar bg-info" type="progressbar" id="12dl"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: {{ \App\Models\user_milestones::where('reps', '12')->where('lift', 'Deadlift')->where('username', auth()->user()->username)->get()->first()->weight }}%">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                @for ($i = 0; $i < 6; $i++)
                                                    <div id="12dl{{ $i * 20 }}">{{ $i * 20 }}KG</div>
                                                @endfor

                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <button
                                                class="btn btn-danger
                                            {{ \App\Models\user_milestones::where('reps', '12')->where('lift', 'Deadlift')->where('username', auth()->user()->username)->get()->first()->weight == 0? 'disabled': '' }}
                                            
                                            "
                                                type='mst' mode="lazy" lift="Deadlift" reps="12">I Slacked
                                                Off</button>
                                            <button
                                                class="btn btn-success
                                            {{ \App\Models\user_milestones::where('reps', '12')->where('lift', 'Deadlift')->where('username', auth()->user()->username)->get()->first()->weight == 100? 'disabled': '' }}
                                            
                                            "
                                                type='mst' mode="work" lift="Deadlift" reps="12">Advance
                                                Progress</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h3 class="card-title text-center">BARBELL SQUATS</h3>
                                        <div class="progress-container ml-5 mb-3">
                                            <div class="progress h-30">
                                                <div class="progress-bar bg-info" type="progressbar" id="12bs"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: {{ \App\Models\user_milestones::where('reps', '12')->where('lift', 'Barbell Squats')->where('username', auth()->user()->username)->get()->first()->weight }}%">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                @for ($i = 0; $i < 6; $i++)
                                                    <div id="12bs{{ $i * 20 }}">{{ $i * 20 }}KG</div>
                                                @endfor

                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <button
                                                class="btn btn-danger
                                            {{ \App\Models\user_milestones::where('reps', '12')->where('lift', 'Barbell Squats')->where('username', auth()->user()->username)->get()->first()->weight == 0? 'disabled': '' }}
                                            
                                            "
                                                type='mst' mode="lazy" lift="Barbell Squats" reps="12">I
                                                Slacked Off</button>
                                            <button
                                                class="btn btn-success
                                            {{ \App\Models\user_milestones::where('reps', '12')->where('lift', 'Barbell Squats')->where('username', auth()->user()->username)->get()->first()->weight == 100? 'disabled': '' }}
                                            
                                            "
                                                type='mst' mode="work" lift="Barbell Squats"
                                                reps="12">Advance Progress</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Milestones tab -->


            <div class="tab-pane fade" id="nav-bmi" role="tabpanel" aria-labelledby="nav-bmi-tab">
                <!-- BMI content goes here -->

                <!-- Graph here -->

                <!-- Table here -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Height</th>
                            <th>Weight</th>
                            <th>BMI</th>
                            <th>BMI Classification</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (\App\Models\user_bmi::where('username', auth()->user()->username)->get() as $bmi)
                            <tr>
                                <td> {{ $bmi->date }} </td>
                                <td> {{ $bmi->height }} </td>
                                <td> {{ $bmi->weight }} </td>
                                <td> {{ $bmi->bmi }} </td>
                                <td> {{ $bmi->bmi_classification }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>

            <!-- Profile Tab -->
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="container mt-5 profile-container" id="profile">
                    <div class="profile-header text-center p-4 bg-primary text-white rounded shadow">
                        <img src="{{ asset(\App\Models\user_profile::where('username', auth()->user()->username)->get()->first()->profile_image) }}"
                            alt="Profile Picture" class="rounded-circle profile-picture mb-3">
                        <h4 class="profile-name mb-1">
                            {{ \App\Models\user_profile::where('username', auth()->user()->username)->get()->first()->firstName }}
                            {{ \App\Models\user_profile::where('username', auth()->user()->username)->get()->first()->lastName }}
                        </h4>
                        <p class="profile-email mb-2">{{ auth()->user()->email }}</p>
                        <p class="profile-plan badge bg-light text-dark">Monthly plan</p>
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <button type="profile" targets="qrCodePage" id="qrCodeBtn" class="btn btn-outline-primary">QR
                            Code</button>
                        <button type="profile" targets="editProfilePage" id="editProfileBtn"
                            class="btn btn-outline-primary">Edit Profile</button>
                        <button type="profile" targets="editProfilePage" id="membershipDetailsBtn"
                            class="btn btn-outline-primary">Membership Details</button>
                        <a href="#" id="passwordSecurityBtn" class="btn btn-outline-primary">Password and
                            Security</a>
                        <button type="profile" targets="policiesRegulationsPage" id="policiesRegulationsBtn"
                            class="btn btn-outline-primary">Policies and Regulations</button>
                        <a class="btn btn-outline-danger" href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
            </div>


            <!-- QR Code Page -->
            <div id="qrCodePage" class="page-content" style="display: none;">
                <h3>QR Code</h3>
                <div class="container text-center mt-5">
                    <div class="row mt-5 justify-content-center">
                        <div class="col-md-6">
                            <div class="qr-code-container shadow-lg rounded">
                                <img src="" alt="QR Code" class="img-fluid qr-code-image rounded">
                                <div class="scan-me mt-3">
                                    <i class="fa fa-mobile"></i>
                                    <span class="scan-me-text">SCAN ME</span>
                                </div>
                                <p class="qr-instruction mt-3">Present this QR code to the Gym Admin to check in/out</p>
                                <button class="btn btn-secondary mt-3" target="qrCodePage" type="back"><i
                                        class="fa fa-arrow-left"></i> Back</button>
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
                                        <form id="profileForm" method="POST" action=""
                                            enctype="multipart/form-data">
                                            @csrf
                                            <label for="profile_image" style="cursor: pointer;">
                                                <img src="{{ asset(\App\Models\user_profile::where('username', auth()->user()->username)->get()->first()->profile_image) }}"
                                                    alt="Profile Image"
                                                    class="rounded-circle border border-secondary shadow-sm"
                                                    width="120" height="120">
                                                <input type="file" id="profile_image" name="profile_image"
                                                    accept="image/jpeg,image/png" style="display: none;"
                                                    onchange="document.getElementById('profileForm').submit();">
                                            </label>
                                        </form>
                                        <h4 class="card-title mt-3">
                                            {{ \App\Models\user_profile::where('username', auth()->user()->username)->get()->first()->firstName }}
                                            {{ \App\Models\user_profile::where('username', auth()->user()->username)->get()->first()->lastName }}
                                        </h4>
                                        <p class="card-text text-muted">{{ !Auth::user()->email }}</p>
                                    </div>
                                    <form id="profileFormDetails" method="POST" action=""
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group text-left">
                                            <label for="firstName" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="firstName" name="firstName"
                                                value="{{ \App\Models\user_profile::where('username', auth()->user()->username)->get()->first()->firstName }}"
                                                required>
                                        </div>
                                        <div class="form-group text-left">
                                            <label for="lastName" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="lastName" name="lastName"
                                                value="{{ \App\Models\user_profile::where('username', auth()->user()->username)->get()->first()->lastName }}"
                                                required>
                                        </div>
                                        <div class="form-group text-left">
                                            <label for="birthdate" class="form-label">Date of Birth</label>
                                            <input type="date" class="form-control" id="birthdate" name="birthdate"
                                                value="{{ \App\Models\user_profile::where('username', auth()->user()->username)->get()->first()->birthdate }}"
                                                required>
                                        </div>
                                        <div class="form-group text-left">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ Auth::user()->email }}" required
                                                pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$"
                                                title="Please enter a valid email address">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </form>

                                    <button class="btn btn-secondary ml-2" type='back' target="editProfilePage"><i
                                            class="fa fa-arrow-left"></i> Back</button>
                                </div>
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
                                    <button class="btn btn-secondary mt-3" type="back" target="membershipDetailsPage">
                                        <i class="fa fa-arrow-left"></i> Back
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Policies and Regulations Page -->
        <div id="policiesRegulationsPage" class="page-content" style="display: none;">
            <h3>Data Privacy Notice</h3>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card shadow-lg p-4"
                            style="background-color: #ffffff; border-radius: 10px; width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title mb-4 text-center text-dark">Data Privacy Notice</h5>
                                <div class="policies-content mb-4">
                                    <h6 class="text-uppercase text-secondary">Introduction</h6>
                                    <p>
                                        At Stamina Fitness Centre, we value your privacy and are committed to protecting
                                        your personal data in compliance with the Data Privacy Act of 2012 (Republic Act No.
                                        10173) of the Philippines. This Data Privacy Notice explains how we collect, use,
                                        and safeguard your personal information.
                                    </p>
                                    <h6 class="text-uppercase text-secondary mt-4">Collection of Personal Data</h6>
                                    <p>
                                        We collect personal data that you provide to us directly through various means,
                                        including:
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
                                        <li>To manage your gym membership and provide you with access to our facilities and
                                            services</li>
                                        <li>To conduct health assessments and tailor fitness programs to your needs</li>
                                        <li>To communicate with you regarding your membership, schedules, and any updates
                                        </li>
                                        <li>To process your payments and manage your financial transactions</li>
                                        <li>To improve our services through internal analysis and research</li>
                                        <li>To ensure your safety and provide first aid or emergency response if necessary
                                        </li>
                                    </ul>
                                    <h6 class="text-uppercase text-secondary mt-4">Data Security</h6>
                                    <p>
                                        We implement appropriate technical and organizational measures to protect your
                                        personal data from unauthorized access, use, or disclosure. These measures include:
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
                                        We do not share your personal data with third parties without your consent, except
                                        in the following circumstances:
                                    </p>
                                    <ul>
                                        <li>When required by law or legal processes</li>
                                        <li>When necessary to provide our services (e.g., sharing information with fitness
                                            instructors for personalized training)</li>
                                        <li>When required to protect your vital interests (e.g., sharing medical information
                                            with healthcare providers in emergencies)</li>
                                    </ul>
                                    <h6 class="text-uppercase text-secondary mt-4">Retention of Personal Data</h6>
                                    <p>
                                        We retain your personal data only for as long as necessary to fulfill the purposes
                                        for which it was collected and to comply with legal obligations. The retention
                                        period may vary depending on the type of data and the purpose for its collection.
                                    </p>
                                    <h6 class="text-uppercase text-secondary mt-4">Your Rights</h6>
                                    <p>
                                        Under the Data Privacy Act of 2012, you have the following rights regarding your
                                        personal data:
                                    </p>
                                    <ul>
                                        <li><strong>Right to Access:</strong> You can request access to your personal data
                                            held by us.</li>
                                        <li><strong>Right to Rectification:</strong> You can request corrections to any
                                            inaccuracies in your personal data.</li>
                                        <li><strong>Right to Erasure:</strong> You can request the deletion of your personal
                                            data under certain conditions.</li>
                                        <li><strong>Right to Restrict Processing:</strong> You can request the restriction
                                            of processing your personal data under certain conditions.</li>
                                        <li><strong>Right to Object:</strong> You can object to the processing of your
                                            personal data under certain conditions.</li>
                                        <li><strong>Right to Data Portability:</strong> You can request the transfer of your
                                            personal data to another organization.</li>
                                    </ul>
                                    <p>
                                        To exercise these rights, please contact us at our provided contact information. We
                                        will respond to your request within a reasonable timeframe.
                                    </p>
                                    <h6 class="text-uppercase text-secondary mt-4">Changes to the Privacy Notice</h6>
                                    <p>
                                        We may update this Data Privacy Notice from time to time to reflect changes in our
                                        practices or for other operational, legal, or regulatory reasons. Any changes will
                                        be posted on our website and, where appropriate, notified to you via email.
                                    </p>
                                    <p class="mt-4">
                                        If you have any questions or concerns about our Data Privacy Notice, please do not
                                        hesitate to contact us at 09234567891 or visit our customer service desk.
                                    </p>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-secondary mt-3" type="back"
                                        target="policiesRegulationsPage">
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



    <!-- FontAwesome for icons -->




@endsection
@section('script')
    <script type="module">
        document.addEventListener('DOMContentLoaded', (event) => {
            const darkModeToggle = document.getElementById('darkModeToggle');
            const body = document.body;

            // Load saved dark mode preference
            if (localStorage.getItem('dark-mode') === 'enabled') {
                body.classList.add('dark-mode');
                darkModeToggle.checked = true;
            }

            darkModeToggle.addEventListener('change', () => {
                body.classList.toggle('dark-mode');
                if (body.classList.contains('dark-mode')) {
                    localStorage.setItem('dark-mode', 'enabled');
                } else {
                    localStorage.setItem('dark-mode', 'disabled');
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Workout Plan Chart
            var ctxWorkout = document.getElementById('workoutPlanChart').getContext('2d');
            var workoutPlanChart = new Chart(ctxWorkout, {
                type: 'bar',
                data: {
                    labels: ['Deadlift', 'Squats'],
                    datasets: [{
                            label: 'Sets',
                            data: [2, 3],
                            backgroundColor: 'rgba(255, 206, 86, 0.2)',
                            borderColor: 'rgba(255, 206, 86, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Reps',
                            data: [8, 10],
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Weight (kg)',
                            data: [30, 40],
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Count / Weight (kg)',
                                color: '#666'
                            }
                        }
                    },
                    onClick: function(event, elements) {
                        if (elements.length > 0) {
                            var elementIndex = elements[0].index;
                            var datasetIndex = elements[0].datasetIndex;
                            var datasetLabel = workoutPlanChart.data.datasets[datasetIndex].label;
                            var datasetValue = workoutPlanChart.data.datasets[datasetIndex].data[
                                elementIndex];
                            var exerciseLabel = workoutPlanChart.data.labels[elementIndex];

                            generateInsight(datasetLabel, datasetValue, exerciseLabel);
                        }
                    }
                }
            });

            function generateInsight(label, value, exercise) {
                var insightText = '';
                if (label === 'Sets') {
                    insightText = `You have planned ${value} sets of ${exercise}.`;
                } else if (label === 'Reps') {
                    insightText = `You have planned ${value} reps for each set of ${exercise}.`;
                } else if (label === 'Weight (kg)') {
                    insightText = `You have planned to lift ${value} kg for ${exercise}.`;
                }

                document.getElementById('chartInsights').innerText = insightText;
            }

            // Workout Duration Chart
            var ctxDuration = document.getElementById('progressChart').getContext('2d');
            var durationChart = new Chart(ctxDuration, {
                type: 'line',
                data: {
                    labels: [
                        'June 1', 'June 2', 'June 3', 'June 5', 'June 7', 'June 9', 'June 11',
                        'June 13', 'June 15', 'June 17', 'June 19', 'June 21', 'June 23', 'June 25'
                    ],
                    datasets: [{
                        label: 'Workout Duration (minutes)',
                        data: [
                            115,
                            115,
                            115,
                            115,
                            115,
                            115,
                            115,
                            120,
                            115,
                            120,
                            110,
                            115,
                            120,
                            115
                        ],
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Insights for Workout Duration Chart
            function generateDurationInsights() {
                var insights = '';
                var data = durationChart.data.datasets[0].data;

                // Calculate total duration
                var totalDuration = data.reduce((a, b) => a + b, 0);

                // Calculate average duration
                var averageDuration = totalDuration / data.length;

                insights += `<p>Total Workout Duration: ${totalDuration} minutes over 14 days.</p>`;
                insights += `<p>Average Daily Workout Duration: ${averageDuration.toFixed(2)} minutes.</p>`;

                document.getElementById('progressInsights').innerHTML = insights;
            }

            // Generate insights after the chart is rendered
            durationChart.options.animation.onComplete = generateDurationInsights;

            // Calendar
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [{
                        title: 'Workout session with Coach Alex',
                        start: '2024-06-01T08:10:00',
                        end: '2024-06-01T10:05:00',
                        description: 'Bench Press - 3 sets of 8 reps with 20kg and Squats - 3 sets of 10 reps with 40kg.'
                    },
                    {
                        title: 'Workout session with Coach Alex',
                        start: '2024-06-02T08:05:00',
                        end: '2024-06-02T10:00:00',
                        description: 'Deadlift - 2 sets of 8 reps with 30kg and Bench Press - 3 sets of 8 reps with 20kg.'
                    },
                    {
                        title: 'Yoga Class',
                        start: '2024-06-03T08:15:00',
                        end: '2024-06-03T10:10:00',
                        description: 'Beginner Yoga Class.'
                    },
                    {
                        title: 'Workout session with Coach Alex',
                        start: '2024-06-05T08:20:00',
                        end: '2024-06-05T10:15:00',
                        description: 'Deadlift - 2 sets of 8 reps with 30kg and Squats - 3 sets of 10 reps with 40kg.'
                    },
                    {
                        title: 'Workout session with Coach Alex',
                        start: '2024-06-07T08:10:00',
                        end: '2024-06-07T10:05:00',
                        description: 'Bench Press - 3 sets of 8 reps with 20kg and Squats - 3 sets of 10 reps with 40kg.'
                    },
                    {
                        title: 'Workout session with Coach Alex',
                        start: '2024-06-09T08:25:00',
                        end: '2024-06-09T10:20:00',
                        description: 'Deadlift - 2 sets of 8 reps with 30kg and Bench Press - 3 sets of 8 reps with 20kg.'
                    },
                    {
                        title: 'Workout session with Coach Alex',
                        start: '2024-06-11T08:10:00',
                        end: '2024-06-11T10:05:00',
                        description: 'Bench Press - 3 sets of 8 reps with 20kg and Squats - 3 sets of 10 reps with 40kg.'
                    },
                    {
                        title: 'Workout session with Coach Alex',
                        start: '2024-06-13T08:00:00',
                        end: '2024-06-13T10:00:00',
                        description: 'Deadlift - 2 sets of 8 reps with 30kg and Squats - 3 sets of 10 reps with 40kg.'
                    },
                    {
                        title: 'Workout session with Coach Alex',
                        start: '2024-06-15T08:05:00',
                        end: '2024-06-15T10:00:00',
                        description: 'Bench Press - 3 sets of 8 reps with 20kg and Deadlift - 2 sets of 8 reps with 30kg.'
                    },
                    {
                        title: 'Workout session with Coach Alex',
                        start: '2024-06-17T08:10:00',
                        end: '2024-06-17T10:10:00',
                        description: 'Deadlift - 2 sets of 8 reps with 30kg and Bench Press - 3 sets of 8 reps with 20kg.'
                    },
                    {
                        title: 'Workout session with Coach Alex',
                        start: '2024-06-19T08:15:00',
                        end: '2024-06-19T10:05:00',
                        description: 'Bench Press - 3 sets of 8 reps with 20kg and Squats - 3 sets of 10 reps with 40kg.'
                    },
                    {
                        title: 'Workout session with Coach Alex',
                        start: '2024-06-21T08:00:00',
                        end: '2024-06-21T09:55:00',
                        description: 'Deadlift - 2 sets of 8 reps with 30kg and Squats - 3 sets of 10 reps with 40kg.'
                    },
                    {
                        title: 'Workout session with Coach Alex',
                        start: '2024-06-23T08:00:00',
                        end: '2024-06-23T10:00:00',
                        description: 'Bench Press - 3 sets of 8 reps with 20kg and Deadlift - 2 sets of 8 reps with 30kg.'
                    },
                    {
                        title: 'Workout session with Coach Alex',
                        start: '2024-06-25T08:20:00',
                        end: '2024-06-25T10:15:00',
                        description: 'Deadlift - 2 sets of 8 reps with 30kg and Squats - 3 sets of 10 reps with 40kg.'
                    },
                    {
                        title: 'Workout session with Coach Alex',
                        start: '2024-06-27T08:05:00',
                        end: '2024-06-27T09:50:00',
                        description: 'Bench Press - 3 sets of 8 reps with 20kg and Squats - 3 sets of 10 reps with 40kg.'
                    },
                    {
                        title: 'Workout session with Coach Alex',
                        start: '2024-06-29T08:10:00',
                        end: '2024-06-29T10:05:00',
                        description: 'Deadlift - 2 sets of 8 reps with 30kg and Bench Press - 3 sets of 8 reps with 20kg.'
                    },
                    {
                        title: 'Workout session with Coach Alex',
                        start: '2024-06-30T08:00:00',
                        end: '2024-06-30T09:55:00',
                        description: 'Bench Press - 3 sets of 8 reps with 20kg and Squats - 3 sets of 10 reps with 40kg.'
                    }
                ],
                eventClick: function(info) {
                    // Display event details in the modal
                    document.getElementById('eventTitle').innerText = 'Title: ' + info.event.title;
                    document.getElementById('eventTime').innerText = 'Time: ' + info.event.start
                        .toLocaleString() + ' - ' + info.event.end.toLocaleString();
                    document.getElementById('eventDescription').innerText = 'Description: ' + info.event
                        .extendedProps.description;

                    // Show the modal
                    var eventDetailsModal = new bootstrap.Modal(document.getElementById(
                        'eventDetailsModal'));
                    eventDetailsModal.show();
                }
            });
            calendar.render();

            // Toggle visit history
            document.getElementById('attendanceChevron').addEventListener('click', function() {
                var visitHistory = document.getElementById('visitHistory');
                var chevron = this;
                if (visitHistory.classList.contains('show')) {
                    visitHistory.classList.remove('show');
                    chevron.classList.remove('fa-chevron-down');
                    chevron.classList.add('fa-chevron-right');
                } else {
                    visitHistory.classList.add('show');
                    chevron.classList.remove('fa-chevron-right');
                    chevron.classList.add('fa-chevron-down');
                }
            });

            document.getElementById('recentActivityChevron').addEventListener('click', function() {
                var recentActivityDetails = document.getElementById('recentActivityDetails');
                var chevron = this;
                if (recentActivityDetails.classList.contains('show')) {
                    recentActivityDetails.classList.remove('show');
                    chevron.classList.remove('fa-chevron-down');
                    chevron.classList.add('fa-chevron-right');
                } else {
                    recentActivityDetails.classList.add('show');
                    chevron.classList.remove('fa-chevron-right');
                    chevron.classList.add('fa-chevron-down');
                }
            });

            document.getElementById('visitHistory').addEventListener('hidden.bs.collapse', function() {
                var chevron = document.getElementById('attendanceChevron');
                chevron.classList.remove('fa-chevron-down');
                chevron.classList.add('fa-chevron-right');
            });

            document.getElementById('visitHistory').addEventListener('shown.bs.collapse', function() {
                var chevron = document.getElementById('attendanceChevron');
                chevron.classList.remove('fa-chevron-right');
                chevron.classList.add('fa-chevron-down');
            });

            document.getElementById('recentActivityDetails').addEventListener('hidden.bs.collapse', function() {
                var chevron = document.getElementById('recentActivityChevron');
                chevron.classList.remove('fa-chevron-down');
                chevron.classList.add('fa-chevron-right');
            });

            document.getElementById('recentActivityDetails').addEventListener('shown.bs.collapse', function() {
                var chevron = document.getElementById('recentActivityChevron');
                chevron.classList.remove('fa-chevron-right');
                chevron.classList.add('fa-chevron-down');
            });
        });
    </script>
@endsection
