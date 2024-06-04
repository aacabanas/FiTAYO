@extends('base')
@section('title', 'Dashboard')
@section('content')
    <div id="test">

    </div>
    <div class="nav nav-tabs text-center row" id="nav-tab" role="tablist">
        <div class="col border-dark">
            <a href="#dashboard" class="nav-link active" id="nav-dashboard" data-bs-toggle="tab" role="tab"
                aria-controls="dashboard" aria-selected="true"><i class="fa-solid fa-home"></i> Dashboard</a>
        </div>
        <div class="col border-dark">
            <a href="#memberlist" class="nav-link" id="nav-memberlist" data-bs-toggle="tab" role="tab"
                aria-controls="memberlist" aria-selected="false"><i class="fa-solid fa-list"></i> Member List</a>
        </div>
        <div class="col border-dark">
            <a href="#newmember" class="nav-link" id="nav-newmember" data-bs-toggle="tab" role="tab"
                aria-controls="newmember" aria-selected="false"><i class="fa-solid fa-user-plus"></i> Register Member</a>
        </div>
        <div class="col border-dark">
            <a href="#assignto" class="nav-link" id="nav-assign" data-bs-toggle="tab" role="tab"
                aria-controls="assignto" aria-selected="false"><i class="fa-solid fa-gears"></i> Assign Trainer</a>
        </div>
        <div class="col border-dark">
            <a href="#check" class="nav-link" id="nav-check" role="tab" aria-selected="false" aria-controls="check"
                data-bs-toggle="tab">Check in/Check out</a>
        </div>
        <div class="col border-dark">
            <a class="text-center nav-link justify-content-center" data-bs-toggle="dropdown" aria-expanded="false"><i
                    class="fa-solid fa-user" data-bs-toggle="dropdown" aria-expanded="false"></i> Hello
                {{ auth()->user()->username }}</a>
            <ul class="dropdown-menu">
                <li><a id="col-blue" href="{{ route('logout') }}" class='dropdown-item text-center'><i
                            class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="nav-dashboard">
            <h2>Dashboard</h2>
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Monthly New Members</h5>
                            <p class="card-text">{{ $monthly }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Daily Check-in</h5>
                            <p class="card-text">{{$checkincount}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Guests Today</h5>
                            <p class="card-text">(rt count)</p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">

            </div>
            <br>
            <div class="row">

            </div>
            <br>
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h5>Incoming Membership Deadlines</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Membership Deadline</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Doe</td>
                                    <td>John</td>
                                    <td>June xx,xxxx</td>
                                    <td>john.doe@example.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="memberlist" role="tabpanel" aria-labelledby="nav-memberlist">
            <h2>Member List</h2>
            <br>
            <div class="nav nav-tabs text-center" id="nav-memb">
                <div class="col">
                    <a href="#memlist" class="nav-link active border-dark" id="nav-memlist" data-bs-toggle="tab"
                        role="tab" aria-controls="memlist" aria-selected="true">Member</a>
                </div>
                <div class="col">
                    <a href="#nonmemlist" class="nav-link border-dark" id="nav-nonmemlist" data-bs-toggle="tab"
                        role="tab" aria-controls="nonmemlist" aria-selected="false">Non-Member</a>

                </div>
            </div>
            <div class="tab-content" id="nav-membContent">
                <div class="tab-pane fade show active" id="memlist" role="tabpanel" aria-labelledby="nav-memlist">
                    <br>
                    <div class="row">
                        <div class="col-8">
                            <h2>Members List</h2>

                        </div>
                        <div class="col-4"><input type="text" id="search_member" class="form-control"
                                placeholder="Search for member"></div>

                    </div>
                    <br>
                    <div class="row">

                        <table class="table table-hover text-center" id="mem-list">
                            <thead>
                                <tr>
                                    <th>Membership ID</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Membership Plan</th>
                                    <th>Membership Date</th>
                                    <th>Membership Expiry</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($members); $i++)
                                    <tr class="text-center align-items-center justify-content-center">
                                        <td class='d-none'>{{ $members[$i]['ID'] }} {{ $members[$i]['lastName'] }}
                                            {{ $members[$i]['firstName'] }}</td>
                                        <td>{{ $members[$i]['ID'] }}</td>
                                        <td>{{ $members[$i]['lastName'] }}</td>
                                        <td>{{ $members[$i]['firstName'] }}</td>
                                        <td>{{ $members[$i]['membership_plan'] }}</td>
                                        <td>{{ $members[$i]['start_date'] }}</td>
                                        <td>{{ $members[$i]['expiry_date'] }}</td>
                                        <td>{{ $members[$i]['payment_status'] }}</td>

                                        <td>
                                            <button class="btn btn-primary" type="fitayo-view"
                                                edit-key="{{ $members[$i]['ID'] }}" data-bs-toggle="modal"
                                                data-bs-target="#viewMemberModal">View</button>
                                            <button class="btn btn-secondary" type="fitayo-edit"
                                                edit-key="{{ $members[$i]['ID'] }}" data-bs-toggle="modal"
                                                data-bs-target="#editMemberModal">Edit</button>
                                            <button class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>



                </div>
                <div class="tab-pane" id="nonmemlist" role="tabpanel" aria-labelledby="nav-nonmemlist">
                    <br>
                    <div class="row">
                        <div class="col-8">
                            <h2>Non-Members List</h2>

                        </div>
                        <div class="col-4"><input type="text" id="search_non_member" class="form-control"
                                placeholder="Search for non-member"></div>

                    </div>
                    <br>
                    <div class="row">
                        <table class="table table-hover text-center" id="non_mem_list">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Not</td>
                                    <td>yet</td>
                                    <td>implemented</td>
                                    <td>-Happy 2.0 Friends</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="tab-pane" id="newmember" role="tabpanel" aria-labelledby="nav-newmember">
            <h2>Registration Form</h2><br>
            <div class="nav nav-tabs text-center" id="nav-regmemb">
                <div class="col">
                    <a href="#regmemlist" class="nav-link active border-dark" id="nav-regmemlist" data-bs-toggle="tab"
                        role="tab" aria-controls="regmemlist" aria-selected="true">Member</a>
                </div>
                <div class="col">
                    <a href="#regnonmemlist" class="nav-link border-dark" id="nav-regnonmemlist" data-bs-toggle="tab"
                        role="tab" aria-controls="regnonmemlist" aria-selected="false">Non-Member</a>

                </div>
            </div>
            <div class="tab-content" id="nav-regmembContent">
                <div class="tab-pane  fade show active" id="regmemlist" role="tabpanel"
                    aria-labelledby="nav-regmemlist"><br>
                    <form action="{{ route('register.POST') }}" method="post">
                        @csrf
                        <input type="hidden" name="regID" value="{{ $id }}">
                        <input type="text" name="regMem" id="regMem" class="d-none" value="Member">

                        <div class="row text-center border border-black">
                            <h4>Profile</h4>
                        </div>
                        <br>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-6">
                                <label for="regFName">&nbsp;&nbsp;First Name:&nbsp;</label>
                                <input type="text" class="form-control" name="regFName" id="regFName"
                                    placeholder="Enter your first name" required="required">
                            </div>
                            <div class="col-6">
                                <label for="regLName">&nbsp;&nbsp;Last Name:&nbsp;</label>
                                <input type="text" name="regLName" id="regLName" class="form-control"
                                    placeholder="Enter your last name" required="required">
                            </div>
                        </div>

                        <br>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-6">
                                <label for="regContactDetails" class='form-label' required="required">&nbsp;&nbsp;Contact
                                    Details:&nbsp;</label>

                                <div class=" justify-content-center align-items-center d-flex">

                                    <input type="hidden" name="regContactPrefix" id="regContactPrefix">

                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-expanded="false" id="contact_prefix_dropdown"></button>
                                        <ul class="dropdown-menu" id="contact_prefix"
                                            style="max-height: 250px;overflow-y:scroll;">

                                        </ul>
                                    </div>
                                    <input type="tel" name="regContactDetails" id="regContactDetails"
                                        placeholder="Enter your contact number" class="form-control" required="required">

                                </div>


                            </div>
                            <div class="col-6">
                                <label for="regBirthdate" class='form-label'>&nbsp;&nbsp;Birthdate:&nbsp;</label>
                                <input type="date" name="regBirthdate" id="regBirthdate" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <label for="regRegion" class="form-label">Region:&nbsp;</label>

                                <select name="regRegion" id="regRegion" class="form-select" required="required">
                                    <option selected region_code="None">Choose a Region</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="regCity" class="form-label">City:&nbsp;</label>
                                <select name="regCity" id="regCity" class="form-select" required="required">
                                    <option city_code="None" selected>Choose a City</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">
                                <label for="regBarangay" class="form-label">Barangay</label>
                                <select name="regBarangay" id="regBarangay" class="form-select" required="required">
                                    <option selected="selected">Choose a Barangay</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="regStreetNum" class="form-label">Street No./Street</label>
                                <input type="text" name="regStreetNum" id="regStreetNum" class="form-control"
                                    required="required">
                            </div>
                        </div>
                        <br>

                        <div class="row text-center border border-black">
                            <h4>Membership</h4>
                        </div>
                        <br>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-6">
                                <label for="regMembershipPlan" class="form-label">Membership Plan:&nbsp;</label>
                                <select name="regMembershipPlan" id="regMembershipPlan" class="form-select">
                                    <option selected>Choose Plan</option>
                                    <option value="Standard">Standard</option>
                                    <option value="Premium">Premium</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="regStartDate" class="form-label">Start Date:&nbsp;</label>
                                <input type="date" name="regStartDate" id="regStartDate" class="form-control" value="{{date('Y-m-d')}}">
                            </div>
                        </div><br>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-6">
                                <label for="regPaymentStatus" class="form-label">Payment Status:&nbsp;</label>
                                <select name="regPaymentStatus" id="regPaymentStatus" class="form-select">
                                    <option selected>Has Paid?</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="regTrainer" class="form-label">Trainer</label>
                                <select name="regTrainer" id="regTrainer" class="form-select">
                                    <option selected>Choose the trainer</option>
                                    @foreach ($trainers as $trainer)    
                                        <option value="{{$trainer->firstname}} {{$trainer->lastname}}">{{$trainer->firstname}} {{$trainer->lastname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><br>
                        <div class="row text-center border border-black">
                            <h4>Credentials</h4>
                        </div>
                        <br>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-6">
                                <label for="regUsername" class="form-label">Username:&nbsp;</label>
                                <input type="text" class="form-control" id="regUsername" name="regUsername"
                                    placeholder="Enter your Username">
                            </div>
                            <div class="col-6">
                                <label for="regPassword">Password:&nbsp;</label>
                                <input type="password" name="regPassword" id="regPassword" class="form-control"
                                    placeholder="Enter your Password">
                            </div>
                        </div>
                        <br>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-6">
                                <label for="regEmail" class="form-label">Email:&nbsp;</label>
                                <input type="email" name="regEmail" id="regEmail" class="form-control"
                                    placeholder="Enter your Email">
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane" id="regnonmemlist" role="tabpanel" aria-labelledby="nav-regnonmemlist">
                    Non-Members
                </div>
            </div>
        </div>
        <div class="tab-pane" id="assignto" role="tabpanel" aria-labelledby="nav-assign">Assign Trainer</div>
        <div class="tab-pane" id="check" role="tabpanel"
            aria-labelledby="nav-check">
            <div class="container">
                
                    <div id="qr-reader"></div>
                    <br>
                    
            </div>
            <div class="container">
                <div id="qr-result">
                    <div class="row">
                        <h4 id="username"></h4>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <form action="{{route('check_in')}}" method="post">
                                @csrf
                                <div class="row">
                                    <button type="submit" class="btn btn-success">Check-in</button>
                                </div>
                                <br>                        
                                <input class="d-none" type="number" name="cinid" id="cinid" required="required"><br>
                                <input class="d-none" type="text" name="cinusername" id="cinusername" required="required">
                            </form>
                        </div>
                        <div class="col-6">
                            <form action="{{route('check_out')}}" method="post">
                                @csrf
                                <div class="row">
                                    <button type="submit" class="btn btn-danger">Check-out</button>
                                </div>
                                <br>                        
                                <input class="d-none" type="number" name="coid" id="coid" required="required"><br>
                                <input class="d-none" type="text" name="cousername" id="cousername" required="required">
                            </form>
                            
                            
                        </div>
                    </div>
                    @if(session()->has('check_in'))
                    <script>
                        alert("{{check_in}}")
                    </script>
                    @endif
                    
                </div>
            </div>
            <div class="row">
                
            </div>

        </div>

    </div>
    <div class="modal fade" tabindex="-1" id="viewMemberModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header row">

                    <div class="col"></div>
                    <div class="col">
                        <h3 id="viewDetail"></h3>
                    </div>
                    <div class="col"></div>



                </div>
                <div class="modal-body">
                    <div class="nav nav-tabs text-center row" id="nav-view">
                        <div class="col">
                            <a href="#credential-view" class="nav-link active" id="nav-cred-view" data-bs-toggle="tab"
                                role="tab" aria-controls="credential" aria-selected="true">Credentials</a>
                        </div>
                        <div class="col">
                            <a href="#profile-view" class="nav-link" id="nav-profile-view" data-bs-toggle="tab"
                                role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                        </div>
                        <div class="col">
                            <a href="#membership-view" class="nav-link" id="nav-membership-view" data-bs-toggle="tab"
                                role="tab" aria-controls="membership" aria-selected="false">Membership</a>
                        </div>
                        <div class="col">
                            <a href="#assessment-view" class="nav-link" id="nav-assessment-view" data-bs-toggle="tab"
                                role="tab" aria-controls="assessment" aria-selected="false">Assessment</a>
                        </div>
                    </div>
                    <br>
                    <div class="tab-content" id="nav-viewContent">
                        <div class="tab-pane fade show active" id="credential-view" role="tabpanel"
                            aria-labelledby="nav-cred-view">


                            <div class="row">
                                <div class="col-2"><label class="form-label" for="viewEmail">Email:&nbsp;</label>
                                </div>
                                <div class="col-10"><input type="text" class="form-control" id="viewEmail"
                                        readonly="readonly"></div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-2"><label class="form-label" for="viewUsername">Username:&nbsp;</label>
                                </div>
                                <div class="col-10"><input type="text" id="viewUsername" class="form-control"
                                        readonly="readonly"></div>
                            </div>
                            <br>
                            <div class="row">
                                <button type="submit" class="d-none btn btn-success"
                                    id="credential-submit">Update</button>
                            </div>

                        </div>
                        <div class="tab-pane" id="profile-view" role="tabpanel" aria-labelledby="nav-profile-view">

                            <div class="row">
                                <div class="col-2"><label class="form-label" for="viewFName">First
                                        Name:&nbsp;</label></div>
                                <div class="col-10"><input type="text" id="viewFName" class="form-control"
                                        readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewLName" class="form-label">Last
                                        Name:&nbsp;</label></div>
                                <div class="col-10"><input type="text" id="viewLName" class="form-control"
                                        readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewContactDetails" class="form-label">Contact
                                        Details:</label></div>
                                <div class="col-10"><input type="tel" id="viewContactDetails" class="form-control"
                                        readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewBirthdate"
                                        class="form-label">Birthdate:&nbsp;</label></div>
                                <div class="col-10"><input type="date" class="form-control"readonly="readonly">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewAddressNum" class="form-label">Address
                                        Num:&nbsp;</label></div>
                                <div class="col-10"><input type="text" id="viewAddressNum" class="form-control"
                                        readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewAddressStreet" class="form-label">Address
                                        Street:&nbsp;</label></div>
                                <div class="col-10"><input type="text" class="form-control" id="viewAddressStreet">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewAddressCity" class="form-label">Address
                                        City:&nbsp;</label></div>
                                <div class="col-10"><input type="text" id="viewAddressCity" class="form-control"
                                        readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewAddressRegion" class="form-label">Address
                                        Region:&nbsp;</label></div>
                                <div class="col-10"><input type="text" id="viewAddressRegion" class="form-control"
                                        readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewProfileBio" class="form-label">Profile
                                        Bio:&nbsp;</label></div>
                                <div class="col-10"><input type="text" id="viewProfileBio" class="form-control"
                                        readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <button type="submit" class="d-none btn btn-success" id="profile-submit">Update</button>
                            </div>

                        </div>
                        <div class="tab-pane" id="membership-view" role="tabpanel"
                            aria-labelledby="nav-membership-view">


                            <br>
                            <div class="row">
                                <div class="col-2"><label for="viewMembershipType" class="form-label">Membership
                                        Type:&nbsp;</label></div>
                                <div class="col-10"><input type="text" name="viewMembershipType"
                                        id="viewMembershipType" class="form-control" readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewMembershipPlan" class="form-label">Membership
                                        Plan:&nbsp;</label></div>
                                <div class="col-10"><input type="text" name="viewMembershipPlan"
                                        id="viewMembershipPlan" class="form-control" readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewMembershipDesc" class="form-label">Membership
                                        Desc:&nbsp;</label></div>
                                <div class="col-10"><input type="text" name="viewMembershipDesc"
                                        id="viewMembershipDesc" class="form-control" readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewStartDate" class="form-label">Start
                                        Date:&nbsp;</label></div>
                                <div class="col-10"><input type="date" name="viewStartDate" id="viewStartDate"
                                        class="form-control" readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewExpiryDate" class="form-label">Expiry
                                        Date:&nbsp;</label></div>
                                <div class="col-10"><input type="date" name="viewExpiryDate" id="viewExpiryDate"
                                        class="form-control" readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewNextPayment" class="form-label">Next
                                        Payment:&nbsp;</label></div>
                                <div class="col-10"><input type="date" name="viewNextPayment" id="viewNextPayment"
                                        class="form-control" readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewPaymentStatus" class="form-label">Payment
                                        Status&nbsp;</label></div>
                                <div class="col-10"><input type="text" name="viewPaymentStatus"
                                        id="viewPaymentStatus" class="form-control" readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewTrainer" class="form-label">Trainer:&nbsp;</label>
                                </div>
                                <div class="col-10">
                                    <input type="text" name="viewTrainer" id="viewTrainer" class="form-control"
                                        readonly="readonly">
                                </div>
                            </div><br>
                            <div class="row">
                                <button type="submit" class="d-none btn btn-success"
                                    id="membership-submit">Update</button>
                            </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="assessment-view" role="tabpanel"
                            aria-labelledby="nav-assessment-view">


                            <div class="row">
                                <div class="col-2"><label for="viewHeight" class="form-label">Height:&nbsp;</label>
                                </div>
                                <div class="col-10">
                                    <input type="number" step="0.01" name="viewHeight" id="viewHeight"
                                        class="form-control" readonly="readonly">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewWeight" class="form-label">Weight:&nbsp;</label>
                                </div>
                                <div class="col-10">
                                    <input type="number" name="viewWeight" id="viewWeight" class="form-control"
                                        readonly="readonly" step="0.01">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewBMI" class="form-label">BMI:&nbsp;</label></div>
                                <div class="col-10"><input type="number" name="viewBMI" id="viewBMI"
                                        class="form-control" readonly="readonly" step="0.01"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewBMIType" class="form-label">BMI
                                        Classification:&nbsp;</label></div>
                                <div class="col-10"><input type="text" name="viewBMIType" id="viewBMIType"
                                        class="form-control" readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewFit" class="form-label">Physically Fit?</label>
                                </div>
                                <div class="col-10">
                                    <div class="form-radio form-radio-inline">
                                        <label class="form-radio-label" for="viewFit">Yes</label>
                                        <input class="form-radio-input" type="radio" name="viewFit" id="viewFit"
                                            value="Yes" required="required" disabled>
                                    </div>
                                    <div class="form-radio form-radio-inline">
                                        <label class="form-radio-label" for="viewFit">No</label>
                                        <input class="form-radio-input" type="radio" name="viewFit" id="viewFit"
                                            value="No" required="required" disabled>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-2"><label for="viewOper" class="form-label">Had an operation?</label>
                                </div>
                                <div class="col-10">
                                    <div class="form-radio form-radio-inline">
                                        <label class="form-radio-label" for="viewOper">Yes</label>
                                        <input class="form-radio-input" type="radio" name="viewOper" id="viewOper"
                                            value="Yes" required="required" disabled>
                                    </div>
                                    <div class="form-radio form-radio-inline">
                                        <label class="form-radio-label" for="viewOper">No</label>
                                        <input class="form-radio-input" type="radio" name="viewOper" id="viewOper"
                                            value="No" required="required" disabled>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-2"><label for="viewHB" class="form-label">Had High Blood
                                        Pressure?</label></div>
                                <div class="col-10">
                                    <div class="form-radio form-radio-inline">
                                        <label class="form-radio-label" for="viewHB">Yes</label>
                                        <input class="form-radio-input" type="radio" name="viewHB" id="viewHB"
                                            value="Yes" required="required" disabled>
                                    </div>
                                    <div class="form-radio form-radio-inline">
                                        <label class="form-radio-label" for="viewHB">No</label>
                                        <input class="form-radio-input" type="radio" name="viewHB" id="viewHB"
                                            value="No" required="required" disabled>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-2">
                                    <label for="viewHP" class="form-label">Had heart problem?</label>
                                </div>
                                <div class="col-10">
                                    <div class="form-radio form-radio-inline">
                                        <label class="form-radio-label" for="viewHP">Yes</label>
                                        <input class="form-radio-input" type="radio" name="viewHP" id="viewHP"
                                            value="Yes" required="required" disabled>
                                    </div>
                                    <div class="form-radio form-radio-inline">
                                        <label class="form-radio-label" for="viewHP">No</label>
                                        <input class="form-radio-input" type="radio" name="viewHP" id="viewHP"
                                            value="No" required="required" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2"><label for="viewEmergName" class="form-label">Emergency Contact
                                        Name</label></div>
                                <div class="col-10"><input type="text" class="form-control" name="viewEmergName"
                                        readonly="readonly" id="viewEmergName"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="row">
                                    <div class="col-2"><label for="viewEmergNum" class="form-label">Emergency Contact
                                            Name</label></div>
                                    <div class="col-10"><input type="text" class="form-control" name="viewEmergNum"
                                            readonly="readonly" id="viewEmergNum"></div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <br>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" id="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    Close</button>


            </div>

        </div>
    </div>

    </div>
    <div class="modal fade" id="editMemberModal" tabindex="-1" aria-labelledby="editMemberModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editMemberModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"><br>
                    <div class="row text-center border border-black">
                        <h4>Credentials</h4>
                    </div>
                    <br>
                    <form action="{{ route('update.POST', 'credentials') }}" method="post">
                        @csrf
                        <input type="hidden" name="editCredID" id="editCredID">
                        <div class="row">
                            <div class="col-2"><label for="editUsername" class="form-label">Username:&nbsp;</label>
                            </div>
                            <div class="col-10"><input type="text" name="editUsername" id="editUsername"
                                    class="form-control" required="required"></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2"><label for="editEmail" class="form-label">Email:&nbsp;</label></div>
                            <div class="col-10"><input type="email" name="editEmail" id="editEmail"
                                    class="form-control" required="required"></div>
                        </div>
                        <br>
                        <div class="row"><button type="submit" class="btn btn-primary">Submit</button></div>
                    </form><br>
                    <div class="row text-center border border-black">
                        <h4>Profile</h4>
                    </div>
                    <br>
                    <form action="{{ route('update.POST', 'profile') }}" method="post">
                        @csrf
                        <input type="hidden" name="editProfID" id="editProfID">
                        <div class="row">
                            <div class="col-2"><label for="editFName" class="form-label">First Name:</label></div>
                            <div class="col-10"><input type="text" name="editFName" id="editFName"
                                    class="form-control" required="required"></div>
                        </div><br>
                        <div class="row">
                            <div class="col-2">
                                <label for="editLName" class="form-label">Last Name:</label>
                            </div>
                            <div class="col-10">
                                <input type="text" name="editLName" id="editLName" class="form-control"
                                    required="required">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-2">
                                <label for="editContactDetails" class="form-label">Contact Details:</label>
                            </div>
                            <div class="col-10">
                                <input type="tel" name="editContactDetails" id="editContactDetails"
                                    class="form-control" required="required">

                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-2">
                                <label for="editBirthdate" class="form-label">Birthdate:</label>
                            </div>
                            <div class="col-10">
                                <input type="date" name="editBirthdate" id="editBirthdate" class="form-control"
                                    required="required">

                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-2">
                                <label for="editAge" class="form-label">Age:</label>
                            </div>
                            <div class="col-10">
                                <input type="num" name="editAge" id="editAge" class="form-control"
                                    required="required">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-2">
                                <label for="editStreetNum" class="form-label">Street number/Street:</label>
                            </div>
                            <div class="col-10">
                                <input type="text" name="editStreetNum" id="editStreetNum" class="form-control"
                                    required="required">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-2">
                                <label for="editBarangay" class="form-label">Barangay:</label>
                            </div>
                            <div class="col-10">
                                <input type="text" name="editBarangay" id="editBarangay" class="form-control"
                                    required="required">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-2">
                                <label for="editCity" class="form-label">City:</label>
                            </div>
                            <div class="col-10">
                                <input type="text" name="editCity" id="editCity" class="form-control"
                                    required="required">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-2">
                                <label for="editRegion" class="form-label">Region:</label>
                            </div>
                            <div class="col-10">
                                <input type="text" name="editRegion" id="editRegion" class="form-control"
                                    required="required">
                            </div>
                        </div><br>
                        <div class="row"><button type="submit" class="btn btn-primary">Submit</button></div>
                    </form><br>
                    <div class="row text-center border border-black">
                        <h4>Membership</h4>
                    </div><br>
                    <form action="{{ route('update.POST', 'membership') }}" method="post">
                        @csrf
                        <input type="hidden" name="editMembID" id="editMembID">
                        <div class="row">
                            <div class="col-2"><label for="editMembershipType" class="form-label">Membership
                                    Type:&nbsp;</label></div>
                            <div class="col-10"><input type="text" name="editMembershipType" id="editMembershipType"
                                    class="form-control" required="required"></div>
                        </div><br>
                        <div class="row">
                            <div class="col-2"><label for="editMembershipPlan" class="form-label">Membership
                                    Plan:&nbsp;</label></div>
                            <div class="col-10"><input type="text" name="editMembershipPlan" id="editMembershipPlan"
                                    class="form-control" required="required"></div>
                        </div><br>
                        <div class="row">
                            <div class="col-2"><label for="editMembershipDesc" class="form-label">Membership
                                    Desc:&nbsp;</label></div>
                            <div class="col-10"><input type="text" name="editMembershipDesc" id="editMembershipDesc"
                                    class="form-control" required="required"></div>
                        </div><br>
                        <div class="row">
                            <div class="col-2"><label for="editStartDate" class="form-label">Start
                                    Date:&nbsp;</label></div>
                            <div class="col-10"><input type="date" name="editStartDate" id="editStartDate"
                                    class="form-control" required="required"></div>
                        </div><br>
                        <div class="row">
                            <div class="col-2"><label for="editExpiryDate" class="form-label">Expiry
                                    Date:&nbsp;</label></div>
                            <div class="col-10"><input type="date" name="editExpiryDate" id="editExpiryDate"
                                    class="form-control" required="required"></div>
                        </div><br>
                        <div class="row">
                            <div class="col-2"><label for="editNextPayment" class="form-label">Next
                                    Payment:&nbsp;</label></div>
                            <div class="col-10"><input type="date" name="editNextPayment" id="editNextPayment"
                                    class="form-control" required="required"></div>
                        </div><br>
                        <div class="row">
                            <div class="col-2"><label for="editPaymentStatus" class="form-label">Payment
                                    Status&nbsp;</label></div>
                            <div class="col-10"><input type="text" name="editPaymentStatus" id="editPaymentStatus"
                                    class="form-control" required="required"></div>
                        </div><br>
                        <div class="row">
                            <div class="col-2"><label for="editTrainer" class="form-label">Trainer:&nbsp;</label>
                            </div>
                            <div class="col-10">
                                <input type="text" name="editTrainer" required="required" id="editTrainer"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="row"><button type="submit" class="btn btn-primary">Submit</button></div>
                    </form><br>
                    <div class="row text-center border border-black">
                        <h4>Assessment</h4>
                    </div><br>
                    <form action="{{ route('update.POST', 'assessment') }}" method="post">
                        @csrf
                        <input type="hidden" name="editAsseID" id="editAsseID">
                        <div class="row">
                            <div class="col-2"><label for="editHeight" class="form-label">Height:&nbsp;</label>
                            </div>
                            <div class="col-10">
                                <input type="number" step="0.01" name="editHeight" id="editHeight"
                                    class="form-control">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-2"><label for="editWeight" class="form-label">Weight:&nbsp;</label>
                            </div>
                            <div class="col-10">
                                <input type="number" name="editWeight" id="editWeight" class="form-control"
                                    step="0.01">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-2"><label for="editBMI" class="form-label">BMI:&nbsp;</label></div>
                            <div class="col-10"><input type="number" name="editBMI" id="editBMI"
                                    class="form-control" step="0.01"></div>
                        </div><br>
                        <div class="row">
                            <div class="col-2"><label for="editBMIType" class="form-label">BMI
                                    Classification:&nbsp;</label></div>
                            <div class="col-10"><input type="text" name="editBMIType" id="editBMIType"
                                    class="form-control"></div>
                        </div><br>
                        <div class="row">
                            <div class="col-2"><label for="editFit" class="form-label">Physically Fit?</label>
                            </div>
                            <div class="col-10">
                                <div class="form-radio form-radio-inline">
                                    <label class="form-radio-label" for="editFit">Yes</label>
                                    <input class="form-radio-input" type="radio" name="editFit" id="editFit"
                                        value="Yes">
                                </div>
                                <div class="form-radio form-radio-inline">
                                    <label class="form-radio-label" for="editFit">No</label>
                                    <input class="form-radio-input" type="radio" name="editFit" id="editFit"
                                        value="No">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2"><label for="editOper" class="form-label">Had an operation?</label>
                            </div>
                            <div class="col-10">
                                <div class="form-radio form-radio-inline">
                                    <label class="form-radio-label" for="editOper">Yes</label>
                                    <input class="form-radio-input" type="radio" name="editOper" id="editOper"
                                        value="Yes">
                                </div>
                                <div class="form-radio form-radio-inline">
                                    <label class="form-radio-label" for="editOper">No</label>
                                    <input class="form-radio-input" type="radio" name="editOper" id="editOper"
                                        value="No">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2"><label for="editHB" class="form-label">Had High Blood
                                    Pressure?</label></div>
                            <div class="col-10">
                                <div class="form-radio form-radio-inline">
                                    <label class="form-radio-label" for="editHB">Yes</label>
                                    <input class="form-radio-input" type="radio" name="editHB" id="editHB"
                                        value="Yes">
                                </div>
                                <div class="form-radio form-radio-inline">
                                    <label class="form-radio-label" for="editHB">No</label>
                                    <input class="form-radio-input" type="radio" name="editHB" id="editHB"
                                        value="No">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                <label for="editHP" class="form-label">Had heart problem?</label>
                            </div>
                            <div class="col-10">
                                <div class="form-radio form-radio-inline">
                                    <label class="form-radio-label" for="editHP">Yes</label>
                                    <input class="form-radio-input" type="radio" name="editHP" id="editHP"
                                        value="Yes">
                                </div>
                                <div class="form-radio form-radio-inline">
                                    <label class="form-radio-label" for="editHP">No</label>
                                    <input class="form-radio-input" type="radio" name="editHP" id="editHP"
                                        value="No">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2"><label for="editEmergName" class="form-label">Emergency Contact
                                    Name</label></div>
                            <div class="col-10"><input type="text" class="form-control" name="editEmergName"
                                    id="editEmergName"></div>
                        </div>
                        <div class="row">
                            <div class="col-2"><label for="editEmergNum" class="form-label">Emergency Contact
                                    Number</label></div>
                            <div class="col-10"><input type="text" class="form-control" name="editEmergNum"
                                    id="editEmergNum"></div>
                        </div>


                        <div class="row"><button type="submit" class="btn btn-primary">Submit</button></div>
                    </form>
                </div>

                <br>
            </div>

        </div>
    </div>


    </div>
    </div>
    </div>
@endsection
