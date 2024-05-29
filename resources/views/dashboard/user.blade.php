@extends('base')
@section('title', 'Dashboard')
@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
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

        <div class="container-fluid bg-orange footer">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-link active" id="navleaderboards" data-bs-toggle="tab" href="#nav-leaderboards" role="tab" aria-controls="nav-leaderboards" aria-selected="true">Leaderboards </a>
            <a class="nav-link" id="navmilestones" data-bs-toggle="tab" href="#nav-milestones" role="tab" aria-controls="nav-milestones" aria-selected="false">Milestones</a>
            <a href="#nav-bmi" class="nav-link" id="navbmi" role="tab" aria-controls="nav-bmi" aria-selected="false"  data-bs-toggle="tab">BMI Metrics</a>
            <a href="#nav-profile" class="nav-link" id="navprofile" role="tab" aria-controls="nav-profile" aria-selected="false" data-bs-toggle="tab">Profile</a>
        </div><br>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-leaderboards" role="tabpanel" aria-labelledby="navleaderboards">
                <div class="row">
                    Leaderboards
                </div>
            </div>
            <div class="tab-pane" id="navmilestones" role="tabpanel" aria-labelledby="navmilestones">
                Milestones
            </div>
            <div class="tab-pane" id="nav-bmi" role="tabpanel" aria-labelledby="navbmi">
                <div class="row
                @if ($assessment->bmi_classification=="Underweight")
                        class=bg-secondary"
                    @elseif($assessment->bmi_classification=="Normal")
                        bg-primary"
                    @elseif ($assessment->bmi_classification=="Overweight")
                        bg-warning"
                    @else
                        bg-danger"
                    @endif
                >
                    <div class="col">Height: {{$assessment->height}}inches</div>
                    <div class="col">Weight: {{$assessment->weight}}lbs</div>
                    
                    
                    
                    
                        <div class="col">BMI: {{$assessment->bmi}}</div>
                        <div class="col">BMI Type: {{$assessment->bmi_classification}}</div>

                    
                </div>
            </div>
            <div class="tab-pane" id="nav-profile" role="tabpanel" aria-labelledby="navprofile">
            <div class="row">
                                <div class="col-2"><label class="form-label" for="viewFName">First
                                        Name:&nbsp;</label></div>
                                <div class="col-10"><input type="text" id="viewFName" class="form-control"
                                        readonly="readonly" value="{{$profile->firstName}}"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewLName" class="form-label">Last
                                        Name:&nbsp;</label></div>
                                <div class="col-10"><input type="text" id="viewLName" class="form-control"
                                        readonly="readonly" value="{{$profile->lastName}}"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewContactDetails" class="form-label">Contact
                                        Details:</label></div>
                                <div class="col-10"><input type="tel" id="viewContactDetails" class="form-control"
                                        readonly="readonly" value="{{$profile->contactDetails}}"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewBirthdate"
                                        class="form-label">Birthdate:&nbsp;</label></div>
                                <div class="col-10"><input type="date" class="form-control"readonly="readonly" value="{{$profile->birthdate}}">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewAge" class="form-label">Age</label></div>
                                <div class="col-10"><input type="number" name="viewAge" id="viewAge" class="form-control" readonly="readonly" value="{{$profile->age}}"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewAddressNum" class="form-label">Address
                                        Num:&nbsp;</label></div>
                                <div class="col-10"><input type="text" id="viewAddressNum" class="form-control"
                                        readonly="readonly" value="{{$profile->address_street_num}}"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewAddressStreet" class="form-label">Address
                                        Barangay:&nbsp;</label></div>
                                <div class="col-10"><input type="text" class="form-control" id="viewAddressStreet" value="{{$profile->address_barangay}}">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewAddressCity" class="form-label">Address
                                        City:&nbsp;</label></div>
                                <div class="col-10"><input type="text" id="viewAddressCity" class="form-control"
                                        readonly="readonly" value="{{$profile->address_city}}"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewAddressRegion" class="form-label">Address
                                        Region:&nbsp;</label></div>
                                <div class="col-10"><input type="text" id="viewAddressRegion" class="form-control"
                                        readonly="readonly" value="{{$profile->address_region}}"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewProfileBio" class="form-label">Profile
                                        Bio:&nbsp;</label></div>
                                <div class="col-10"><input type="text" id="viewProfileBio" class="form-control"
                                        readonly="readonly" value="{{$profile->profileBio}}"></div>
                            </div><br>
            </div>
        </div>
        </div>
        @if ($withAssessment)
            <button type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                id="showModal">
            </button>

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Health Assessment</h1>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('new_assessment') }}" method="post" id="assessmentForm">
                                
                                <div class="row">
                                    <div class="col-1"><label for="regHeight" class="form-label">Height<br>(in):&nbsp;</label></div>
                                    <div class="col-5"><input type="number" step="0.01" name="regHeight" id="regHeight" class="form-control" required="required"></div>
                                    <div class="col-1"><label for="regWeight" class="form-label">Weight<br>(lb):&nbsp;</label></div>
                                    <div class="col-5"><input type="number" step="0.01" name="regWeight" id="regWeight" class="form-control" required="required"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-1">
                                        <label for="regBMI" class="form-label">BMI:&nbsp;</label>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control" id="regBMI" name="regBMI" readonly="readonly" step="0.01">
                                    </div>
                                    <div class="col-1">
                                        <label for="regBMIType" class="form-label">BMI Type:&nbsp;</label>
                                    </div>
                                    <div class="col-5">
                                        <input type="text" class="form-control" id="regBMIType" name="regBMIType" readonly="readonly">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="regFit" class="form-label">Are you physically fit?</label><br>
                                        <div class="form-radio form-radio-inline">
                                            <label class="form-radio-label" for="regFit">Yes</label>
                                            <input class="form-radio-input" type="radio" name="regFit" id="regFit" value="Yes" required="required">
                                          </div>
                                          <div class="form-radio form-radio-inline">
                                              <label class="form-radio-label" for="regFit">No</label>
                                            <input class="form-radio-input" type="radio" name="regFit" id="regFit" value="No" required="required">
                                          </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="regOper" class="form-label">Have you undergone an operation?</label>
                                        <div class="form-radio form-radio-inline">
                                            <label for="regOper" class="form-radio-label">Yes</label>
                                            <input type="radio" name="regOper" id="regOper" class="form-radio-input" value="Yes" required="required">
                                        </div>
                                        <div class="form-radio form-radio-inline">
                                            <label for="regOper" class="form-radio-label">No</label>
                                            <input type="radio" name="regOper" id="regOper" class="form-radio-input" value="No" required="required">
                                        </div>
                                    </div>
                                    
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="regBP" class="form-label">Do you have high blood pressure?</label>
                                        <div class="form-radio form-radio-inline">
                                            <label for="regBP" class="form-radio-label">Yes</label>
                                            <input type="radio" name="regBP" id="regBP" class="form-radio-input" value="Yes" required="required">
                                        </div>
                                        <div class="form-radio form-radio-inline">
                                            <label for="regBP" class="form-radio-label">No</label>
                                            <input type="radio" name="regBP" id="regBP" class="form-radio-input" value="No" required="required">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="regHeart" class="form-label">Do you have heart problem?</label>
                                        <div class="form-radio form-radio-inline">
                                            <label for="regHeart" class="form-radio-label">Yes</label>
                                            <input type="radio" name="regHeart" id="regHeart" class="form-radio-input" value="Yes" required="required">
                                        </div>
                                        <div class="form-radio form-radio-inline">
                                            <label for="regHeart" class="form-radio-label">No</label>
                                            <input type="radio" name="regHeart" id="regHeart" class="form-radio-input" value="No" required="required">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="regEmergName" class="form-label">Emergency Contact Name</label>
                                        <input type="text" name="regEmergName" id="regEmergName" class="form-control" required="required">
                                    </div>
                                    <div class="col-6">
                                        <label for="regEmergContact" class="form-label">Emergency Contact Number</label>
                                        <input type="tel" name="regEmergContact" id="regEmergContact" class="form-control" required="required">
                                    </div>
                                </div>
                                @csrf
                                <br>
                                <div class="row">

                                    <button type="submit" class="btn btn-primary" id="alertBtn">Submit</button>
                                </div>
                            </form>
                            <br>
                            
                            <div class="row"  id="alertBtnPlace">
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
