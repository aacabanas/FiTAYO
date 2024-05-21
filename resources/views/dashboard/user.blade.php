@extends('base')
@section('title', 'Dashboard')
@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Leaderboard</title>
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
        </style>
    </head>

    <body>
        <header class="container-fluid bg-primary text-white" style="padding: 20px; margin-bottom: 20px">
            <h1>Leaderboards</h1>
            <p class="d-none" id="hasAssessment">{{ $withAssessment }}</p>
            <p id="date">
                {{ DateTime::createFromFormat('!m', date('m'))->format('F') . ' ' . date('d Y') }}

            </p>
        </header>

        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4"> <!-- Add mb-4 class for margin-bottom -->
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
                <div class="col-md-6 mb-4"> <!-- Add mb-4 class for margin-bottom -->
                    <div class="card h-100"> <!-- Add h-100 class to make it full height -->
                        <div class="card-header bg-primary text-white"> <!-- Change the card-header class -->
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

        <footer class="container-fluid bg-orange text-white footer">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Leaderboards</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Milestones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">BMI Tracker</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
            </ul>
        </footer>
        @if ($withAssessment)
            <button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                id="showModal">
            </button>

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('new_assessment') }}" method="post" id="assessmentForm">
                                @csrf
                                <input type="hidden" name="userID" id="userID" value="{{ auth()->user()->id }}">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-4">
                                        <label for="userWeight" class="form-label">Weight:&nbsp;</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="number" step="0.01" name="userWeight" id="userWeight"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-4"><label for="userHeight" class="form-label">Height:&nbsp;</label>
                                    </div>
                                    <div class="col-8"><input type="number" step="0.01" name="userHeight"
                                            id="userHeight" class="form-control" required></div>
                                </div>
                                <br>
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-4"><label for="userHasInjuries" class="form-label">Has
                                            Injuries?&nbsp;</label></div>
                                    <div class="col-8">
                                        <select name="userHasInjuries" id="userHasInjuries" class="form-select" required>
                                            <option selected>Do you have any injuries?</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>

                                </div>
                                <br>
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-4"><label for="userHasIllness" class="form-label">Has
                                            Illness?&nbsp;</label></div>
                                    <div class="col-8">
                                        <select name="userHasIllness" id="userHasIllness" class="form-select" required>
                                            <option selected>Do you have any illness?</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-4"><label for="userMedHist" class="form-label">Medical History:&nbsp;</label></div>
                                    <div class="col-8"><textarea name="userMedHist" id="userMedHist" class="form-control" required></textarea></div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <div class="row d-none" id='alertPlace'>
                                
                                    <div class="col">

                                        <button class="btn btn-danger" type="button" id="cancel">Cancel</button>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-success" type="submit">Submit</button>
                                    </div>
                                
                            </div>

                            </form>
                            <br>
                            
                            <div class="row"  id="alertBtnPlace">
                                <div class="col">

                                    <button type="button" class="btn btn-primary" id="alertBtn">Submit</button>
                                </div>
                            </div>
                            <br>
                            

                        </div>
                    </div>
                </div>
            </div>
        @endif
    </body>

    </html>
@endsection
