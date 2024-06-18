@extends('base')
@section('title', 'Dashboard')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        
        <style>
            .navbar-nav {
                display: flex;
                justify-content: center;
            }

            .nav-link.active {
                font-weight: bold; 
            }

            .nav-link:hover,
            .nav-link:focus {
                color: black; 
                text-decoration: none; 
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
            
            
             
        </style>

    </head>

    <body> 
        <header class="container-fluid bg-primary text-white" style="padding: 20px; margin-bottom: 20px; margin-top: 20px">
            <h1 id="title">Leaderboards</h1>
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
                        <a href="#" id="nav-trainees-tab" data-bs-toggle="tab" data-bs-target="#nav-trainees" class="nav-link" role="tab" aria-controls="nav-milestones" aria-selected="false">Trainees</a>
                    </li>
                    <li class="nav-item"><a href="{{route('logout')}}" class="nav-link">Logout</a></li>
                </ul>
            </nav>

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

                <div class="tab-pane fade" id="nav-trainees" role="tabpanel" aria-labelledby="nav-trainees-tab">
                    
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist" style="margin-bottom: 20px">
                            <h1 style="margin-left: 5px; margin-right: 15px">Assigned Trainees</h1>
                            <button class="nav-link active" id="nav-advancements-tab" data-bs-toggle="tab" data-bs-target="#nav-advancements" type="button" role="tab" aria-controls="nav-advancements" aria-selected="true">Milestone Advancements</button>
                            <button class="nav-link" id="nav-schedule-tab" data-bs-toggle="tab" data-bs-target="#nav-schedule" type="button" role="tab" aria-controls="nav-schedule" aria-selected="false">Schedule</button>
                        </div>
                    </nav>

                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-advancements" role="tabpanel" aria-labelledby="nav-advancements"> 
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Lift</th>
                                        <th>Weight</th>
                                        <th>Reps Category</th>
                                        <th colspan="2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendings as $pending)
                                        <td>{{$pending->id}}</td>
                                        <td>{{$pending->username}}</td>
                                        <td>{{$pending->lift}}</td>
                                        <td>{{$pending->action}}</td>
                                        <td>{{$pending->reps}}</td>
                                        <td>
                                            <a href="{{route('approve',$pending->id)}}" class="btn btn-success">Approve</a>
                                        <a href="{{route('reject',$pending->id)}}" class="btn btn-danger">Reject</a></td>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row text-center">
                                <div class="col border border-black"><b>ID</b></div>
                                <div class="col border border-black"><b>Username</b></div>
                                <div class="col border border-black"><b>Lift</b></div>
                                <div class="col border border-black"><b>Weight</b></div>
                                <div class="col border border-black"><b>Reps Category</b></div>
                                <div class="col border border-black"><b>Actions</b></div>
                            </div>
                            @foreach ($pendings as $pending)
                                <div class="row text-center align-items-center justify-content-center">
                                    <div class="col border border-black"> {{$pending->id}} </div>
                                    <div class="col border border-black"> {{$pending->username}} </div>
                                    <div class="col border border-black"> {{$pending->lift}} </div>
                                    <div class="col border border-black"> {{$pending->action}} </div>
                                    <div class="col border border-black"> {{$pending->reps}} </div>
                                    <div class="col border border-black">
                                        <div class="row">
                                            <div class="col"><a href="{{route('approve',$pending->id)}}" style="text-decoration: none;color:black">Approve</a></div>
                                            <div class="col"><a href="{{route('reject',$pending->id)}}" style="text-decoration: none;color:black">Reject</a></div>
                                        </div>
                                    </div>
                                </div>
                                
                            @endforeach
                            
                                                          
                            
                        </div>

                        <div class="tab-pane fade" id="nav-schedule" role="tabpanel" aria-labelledby="nav-schedule"> 
                            <div class="row">
                                <div class="col-md-12">

                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Appointments</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody id="trainees-list">
                                        
                                        <tr>
                                            <td>John Doe</td>
                                            <td>123-456-7890</td>
                                            <td>Date|Time</td>
                                            <td>
                                            <button class="btn btn-primary" data-bs-toggle="dropdown" aria-expanded="false">Set Schedule</button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Monday, 9:00 AM</a></li>
                                                <li><a class="dropdown-item" href="#">Tuesday, 10:00 AM</a></li>
                                                <li><a class="dropdown-item" href="#">Wednesday, 11:00 AM</a></li>
                                            </ul>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
          
    </body>   
</html>
@endsection