@extends('base')
@section('title', 'Dashboard')
@section('content')
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
            <a class="text-center nav-link justify-content-center" data-bs-toggle="dropdown" aria-expanded="false"><i
                    class="fa-solid fa-user" data-bs-toggle="dropdown" aria-expanded="false"></i> Hello
                {{ auth()->user()->username }}</a>
            <ul class="dropdown-menu" style="width:360px">
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
                            <p class="card-text">(rt count)</p>
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
                                            <button class="btn btn-primary" type="fitayo-view" edit-key="{{ $members[$i]['ID'] }}" data-bs-toggle="modal"
                                                data-bs-target="#viewMemberModal">View</button>
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
                    <form action="{{route('register.POST')}}" method="post">
                        @csrf
                        <input type="text" name="regMem" id="regMem" class="d-none" value="Member">
                        <div class="row text-center border border-black">
                            <h4>Profile</h4>
                        </div>
                        <br>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-6">
                                <label for="regFName">&nbsp;&nbsp;First Name:&nbsp;</label>
                                <input type="text" class="form-control" name="regFName" id="regFName"
                                    placeholder="Enter your first name">
                            </div>
                            <div class="col-6">
                                <label for="regLName">&nbsp;&nbsp;Last Name:&nbsp;</label>
                                <input type="text" name="regLName" id="regLName" class="form-control"
                                    placeholder="Enter your last name">
                            </div>
                        </div>

                        <br>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-6">
                                <label for="regContactDetails" class='form-label'>&nbsp;&nbsp;Contact
                                    Details:&nbsp;</label>
                                <input type="tel" name="regContactDetails" id="regContactDetails" placeholder="Enter your contact number"
                                    class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="regBirthdate" class='form-label'>&nbsp;&nbsp;Birthdate:&nbsp;</label>
                                <input type="date" name="regBirthdate" id="regBirthdate" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-6">
                                <label for="regAddressNum" class="form-label">Address Number:&nbsp;</label>
                                <input type="text" name="regAddressNum" id="regAddressNum" class="form-control" placeholder="Enter your Address Number">
                            </div>
                            <div class="col-6">
                                <label for="regAddressStreet" class="form-label">Address Street:&nbsp;</label>
                                <input type="text" name="regAddressStreet" id="regAddressStreet" placeholder="Enter your Address Street"
                                    class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-6">
                                <label for="regAddressCity" class="form-label">Address City:&nbsp;</label>
                                <input type="text" name="regAddressCity" id="regAddressCity" class="form-control"placeholder="Enter your Address City">
                            </div>
                            <div class="col-6">
                                <label for="regAddressRegion" class="form-label">Address Region:&nbsp;</label>
                                <input type="text" name="regAddressRegion" id="regAddressRegion"placeholder="Enter your Address Region"
                                    class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row justify-content-center align-items-center">
                            <div class="col">
                                <label for="regProfileBio" class="form-label">Profile Bio:&nbsp;</label>

                                <textarea class="form-control" name="regProfileBio" id="regProfileBio" rows="3" placeholder="Enter your Profile Bio"></textarea>


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
                                <input type="date" name="regStartDate" id="regStartDate" class="form-control">
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
                                <input type="text" name="regTrainer" id="regTrainer" class="form-control">
                            </div>
                        </div><br>
                        <div class="row text-center border border-black">
                            <h4>Credentials</h4>
                        </div>
                        <br>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-6">
                                <label for="regUsername" class="form-label">Username:&nbsp;</label>
                                <input type="text" class="form-control" id="regUsername" name="regUsername" placeholder="Enter your Username">
                            </div>
                            <div class="col-6">
                                <label for="regPassword">Password:&nbsp;</label>
                                <input type="password" name="regPassword" id="regPassword" class="form-control" placeholder="Enter your Password">
                            </div>
                        </div>
                        <br>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-6">
                                <label for="regEmail" class="form-label">Email:&nbsp;</label>
                                <input type="email" name="regEmail" id="regEmail" class="form-control" placeholder="Enter your Email">
                            </div>
                            <div class="col-6">
                                <label for="regUserType" class="form-label">User Type:&nbsp;</label>
                                <select name="regUserType" id="regUserType" class="form-select">
                                    <option selected>Choose user type</option>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
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
                            <form action="{{route('update.POST',['editCredential',auth()->user()->id])}}" method="POST">
                                @csrf
                                <div class="row">
                                    <button class="btn btn-secondary" id="toggleEdit" type="button" action="edit"
                                        target="credential" toggled="0">Edit</button>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-2"><label class="form-label" for="viewEmail">Email:&nbsp;</label>
                                    </div>
                                    <div class="col-10"><input type="text" class="form-control" id="viewEmail"
                                            readonly="readonly"></div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-2"><label class="form-label"
                                            for="viewUsername">Username:&nbsp;</label></div>
                                    <div class="col-10"><input type="text" id="viewUsername" class="form-control"
                                            readonly="readonly"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <button type="submit" class="d-none btn btn-success"
                                        id="credential-submit">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="profile-view" role="tabpanel" aria-labelledby="nav-profile-view">
                            <form action="{{route('update.POST',['editProfile',auth()->user()->id])}}">
                                @csrf
                                <div class="row">
                                    <button class="btn btn-secondary" id="toggleEdit" type="button" action="edit"
                                        target="profile" toggled="0">Edit</button>
                                </div><br>
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
                                    <div class="col-10"><input type="tel" id="viewContactDetails"
                                            class="form-control" readonly="readonly"></div>
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
                                    <div class="col-10"><input type="text" class="form-control"
                                            id="viewAddressStreet"></div>
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
                                    <div class="col-10"><input type="text" id="viewAddressRegion"
                                            class="form-control" readonly="readonly"></div>
                                </div><br>
                                <div class="row">
                                    <div class="col-2"><label for="viewProfileBio" class="form-label">Profile
                                            Bio:&nbsp;</label></div>
                                    <div class="col-10"><input type="text" id="viewProfileBio" class="form-control"
                                            readonly="readonly"></div>
                                </div><br>
                                <div class="row">
                                    <button type="submit" class="d-none btn btn-success"
                                        id="profile-submit">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="membership-view" role="tabpanel"
                            aria-labelledby="nav-membership-view">
                            <form action="{{route('update.POST',['editMembership',auth()->user()->id])}}" method="post">
                                @csrf
                            <div class="row">
                                <button class="btn btn-secondary" id="toggleEdit" type="button" action="edit"
                                    target="membership" toggled="0">Edit</button>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-2"><label for="viewMembershipType" class="form-label">Membership
                                        Type:&nbsp;</label></div>
                                <div class="col-10"><input type="text" name="viewMembershipType" id="viewMembershipType" class="form-control" readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewMembershipPlan" class="form-label">Membership
                                        Plan:&nbsp;</label></div>
                                <div class="col-10"><input type="text" name="viewMembershipPlan" id="viewMembershipPlan" class="form-control" readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewMembershipDesc" class="form-label">Membership
                                        Desc:&nbsp;</label></div>
                                <div class="col-10"><input type="text" name="viewMembershipDesc" id="viewMembershipDesc" class="form-control" readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewStartDate" class="form-label">Start
                                        Date:&nbsp;</label></div>
                                <div class="col-10"><input type="date" name="viewStartDate" id="viewStartDate" class="form-control" readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewExpiryDate" class="form-label">Expiry
                                        Date:&nbsp;</label></div>
                                <div class="col-10"><input type="date" name="viewExpiryDate" id="viewExpiryDate" class="form-control" readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewNextPayment" class="form-label">Next
                                        Payment:&nbsp;</label></div>
                                <div class="col-10"><input type="date" name="viewNextPayment" id="viewNextPayment" class="form-control" readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewPaymentStatus" class="form-label">Payment
                                        Status&nbsp;</label></div>
                                <div class="col-10"><input type="text" name="viewPaymentStatus" id="viewPaymentStatus" class="form-control" readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewTrainer" class="form-label">Trainer:&nbsp;</label>
                                </div>
                                <div class="col-10">
                                    <input type="text" name="viewTrainer" id="viewTrainer" class="form-control" readonly="readonly">
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
                            <form action="{{route('update.POST',['editAssessment',auth()->user()->id])}}" method="POST">
                                @csrf
                            <div class="row">
                                <button class="btn btn-secondary" id="toggleEdit" type="button" action="edit"
                                    target="assessment" toggled="0">Edit</button>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-2"><label for="viewHeight" class="form-label">Height:&nbsp;</label>
                                </div>
                                <div class="col-10">
                                    <input type="number" step="0.01" name="viewHeight" id="viewHeight" class="form-control" readonly="readonly">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewWeight" class="form-label">Weight:&nbsp;</label>
                                </div>
                                <div class="col-10">
                                    <input type="number" name="viewWeight" id="viewWeight" class="form-control" readonly="readonly" step="0.01">
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewBMI" class="form-label">BMI:&nbsp;</label></div>
                                <div class="col-10"><input type="number" name="viewBMI" id="viewBMI" class="form-control" readonly="readonly" step="0.01"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewBMIType" class="form-label">BMI
                                        Classification:&nbsp;</label></div>
                                <div class="col-10"><input type="text" name="viewBMIType" id="viewBMIType" class="form-control" readonly="readonly"></div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewHasIllness" class="form-label">Has
                                        Illness:&nbsp;</label></div>
                                <div class="col-10">
                                    <select name="viewHasIllness" id="viewHasIllness" class="form-select" readonly="readonly">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewHasInjuries" class="form-label">Has
                                        Injuries:&nbsp;</label></div>
                                <div class="col-10">
                                    <select name="viewHasInjuries" id="viewHasInjuries" class="form-select" readonly="readonly">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-2"><label for="viewMedicalHistory">Medical History:&nbsp;</label></div>
                                <div class="col-10"><input type="text" name="viewMedicalHistory" id="viewMedicalHistory" class="form-control"></div>
                            </div><br>
                            <div class="row">
                                <button type="submit" class="d-none btn btn-success"
                                    id="assessment-submit">Update</button>

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <button type="button" class="btn btn-primary" id="close" data-bs-dismiss="modal" aria-label="Close">
                            Close</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
