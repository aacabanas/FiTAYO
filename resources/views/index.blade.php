@extends('layout')
@if (session()->has('user'))
    @section('title', 'FiTAYO - Member Management Dashboard')
@else
    @section('title', 'Home')
@endif
@section('content')
    <div class="container">

    </div>
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('logged'))
        @if (session('user')->user_type == 'admin')
            <script>
                function getData(id) {
                    window.memData(id)
                }
            </script>
            <div class="row nav nav-tabs  text-center" id="nav-tab" role="tablist">

                <div class="col-2 border-dark">
                    <a class="nav-link active" id="nav-dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab"
                        aria-controls="dashboard" aria-selected="true">Dashboard</a>

                </div>
                <div class="col-2 border-dark">
                    <a class="nav-link " id="nav-memlist-tab" data-bs-toggle="tab" href="#memlist" role="tab"
                        aria-controls="memlist" aria-selected="false">Members' List</a>

                </div>
                <div class="col-2 border-dark">
                    <a class="nav-link " id="nav-newmemb-tab" data-bs-toggle="tab" href="#newmemb" role="tab"
                        aria-controls="newmemb" aria-selected="false">New Members</a>

                </div>
                <div class="col-2 border-dark">
                    <a class="nav-link " id="nav-memcheckins-tab" data-bs-toggle="tab" href="#memcheckins" role="tab"
                        aria-controls="memcheckins" aria-selected="false">Member Check-ins</a>

                </div>
                <div class="col-2 border-dark">
                    <a class="nav-link" id="nav-nonmem-tab" data-bs-toggle="tab" href="#nonmem" role="tab"
                        aria-controls="nonmem" aria-selected="false">Non-member Entries</a>

                </div>
                <div class="col-2 border-dark dropdown">
                    <button class="text-center nav-link justify-content-center" data-bs-toggle="dropdown"
                        aria-expanded="false">Hello {{ session('user')->username }}</button>
                    <ul class="dropdown-menu">
                        <li><a href="" class='dropdown-item'>Logout</a></li>
                    </ul>
                </div>
            </div>

            <br>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="nav-dashboard-tab">
                    <h2>Dashboard</h2>
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Monthly New Members</h5>
                                    <p class="card-text">(rt count)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Daily Check-in</h5>
                                    <p class="card-text">(rt count)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
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
                <div class="tab-pane fade" id="memlist" role="tabpanel" aria-labelledby="nav-memlist-tab">
                    <div class="row">
                        <div class="col-8">
                            <h2>Members List</h2>

                        </div>
                        <div class="col-4"><input type="text" name="" id="search" class="form-control"></div>

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
                            <tbody id="content">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="newmemb" role="tabpanel" aria-labelledby="nav-newmemb-tab">
                    <h2>Register New Member</h2>
                    <form id="reg-form" action="{{ route('register.Post') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-1 text-center ">
                                <label for="first-name" class="form-label">First Name:</label>
                            </div>
                            <div class="col-5 border-right-black">
                                <input type="text" class="form-control" name="first_name" id="first-name" required
                                    placeholder="Enter your First Name">
                            </div>
                            <div class="col-1 text-center">
                                <label for="last-name" class="form-label">Last Name:</label>
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control" id="last-name" name="last_name" required
                                    placeholder="Enter your Last Name">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-1 text-center">
                                <label for="contact-number" class="form-label">Contact Number: </label>
                            </div>
                            <div class="col-5">
                                <input type="tel" name="contact_number" id="contact-number" class="form-control"
                                    placeholder="Enter Contact Number">
                            </div>
                            <div class="col-1 text-center">
                                <label for="email" class="form-label">Email</label>
                            </div>
                            <div class="col-5">
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Enter Email">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-1 text-center">
                                <label for="username" class="form-label">Username:</label>
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control" id="username" name="username" required
                                    placeholder="Enter your Username">
                            </div>
                            <div class="col-1 text-center">
                                <label for="password" class="form-label">Password:</label>
                            </div>
                            <div class="col-5">
                                <input type="password" class="form-control" id="password" name="password" required
                                    placeholder="Enter your Password">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-1 text-center">
                                <label for="birthdate" class="form-label">Birthdate:</label>
                            </div>
                            <div class="col-5">
                                <input type="date" name="birthdate" class="form-control" id="birthdate" required>
                            </div>
                            <div class="col-1 text-center">
                                <label for="address-num" class="form-label">Address Number:</label>
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control" id="address-num" name="address_num"required
                                    placeholder="Enter your Address Number">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-1 text-center">
                                <label for="address-street" class="form-label">Address Street:</label>
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control" name="address_street" id="address-street"
                                    required placeholder="Enter your Address Street">
                            </div>
                            <div class="col-1 text-center">
                                <label for="address-city" class="form-label">Address City:</label>
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control" id="address-city" name="address_city"
                                    required placeholder="Enter your Address City">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-1 text-center">
                                <label for="address-region" class="form-label">Address Region:</label>
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control" name="address_region" id="address-region"
                                    required placeholder="Enter your Address Region">
                            </div>
                            <div class="col-1 text-center">
                                <label for="height" class="form-label">Height:</label>
                            </div>
                            <div class="col-5">
                                <input type="number" step="0.01" class="form-control" name="height" id="height"
                                    required placeholder="Enter your Height">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-1 text-center">
                                <label for="weight" class="form-label">Weight:</label>
                            </div>
                            <div class="col-5">
                                <input type="number" step="0.01" class="form-control" name="weight" id="weight"
                                    required placeholder="Enter your Weight">
                            </div>
                            <div class="col-1 text-center">
                                <label for="medical-history" class="form-label">Medical History:</label>
                            </div>
                            <div class="col-5">
                                <textarea class="form-control" id="medical-history" name="medical_history" rows="3" required
                                    placeholder="Enter your Medical History"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-1 text-center">
                                <label for="hasIllness" class="form-label">Has Illness:</label>
                            </div>
                            <div class="col-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hasIllness" id="hasIllnessYes"
                                        value="1">
                                    <label class="form-check-label" for="hasIllnessYes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hasIllness" id="hasIllnessNo"
                                        value="0" checked>
                                    <label class="form-check-label" for="hasIllnessNo">
                                        No
                                    </label>
                                </div>
                            </div>
                            <div class="col-1 text-center">
                                <label for="hasInjuries" class="form-label">Has Injuries:</label>
                            </div>
                            <div class="col-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hasInjuries"
                                        id="hasInjuriesYes" value="1">
                                    <label class="form-check-label" for="hasInjuriesYes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hasInjuries" id="hasInjuriesNo"
                                        value="0" checked>
                                    <label class="form-check-label" for="hasInjuriesNo">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-1 text-center">
                                <label for="user-type" class="form-label">User Type:</label>
                            </div>
                            <div class="col-5">
                                <select name="user_type" id="user-type" class="form-select" required>
                                    <option selected="">Select User Type</option>
                                    <option value="1">User</option>
                                    <option value="2">Admin</option>
                                </select>
                            </div>
                            <div class="col-1 text-center">
                                <label for="membership-type" class="form-label">Membership Type:</label>
                            </div>
                            <div class="col-5">
                                <select name="membership_type" id="membership-type" class="form-select" required>
                                    <option selected="">Select Membership Type</option>
                                    <option value="1">Member</option>
                                    <option value="2">Non-Member</option>
                                </select>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-1 text-center">
                                <label for="membership-desc" class="form-label">Membership Description:</label>
                            </div>
                            <div class="col-5">
                                <input type="text" class="form-control" id="membership-desc" name="membership_desc"
                                    required placeholder="Enter your Membership Description">
                            </div>
                            <div class="col-1 text-center">
                                <label for="membership-plan" class="form-label">Membership Plan:</label>
                            </div>
                            <div class="col-5">
                                <select name="membership_plan" id="membership-plan" class="form-select">
                                    <option selected="">Select Membership Plan</option>
                                    <option value="1">Basic</option>
                                    <option value="2">Standard</option>
                                    <option value="3">Premium</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-1 text-center">
                                <label for="payment-status" class="form-label">Payment Status:</label>
                            </div>
                            <div class="col-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_status"
                                        id="payment-status-paid" value="1" checked>
                                    <label class="form-check-label" for="payment-status-paid">
                                        Paid
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_status"
                                        id="payment-status-unpaid" value="0">
                                    <label class="form-check-label" for="payment-status-unpaid">
                                        Unpaid
                                    </label>
                                </div>
                            </div>
                            <div class="col-1 text-center">
                                <label for="trainer" class="form-label">Trainer:</label>
                            </div>
                            <div class="col-5">
                                <input type="text" name="trainer" class="form-control" id="trainer" required
                                    placeholder="Enter your Trainer">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-1 text-center">
                                <label for="profile-bio" class="form-label">Profile Bio:</label>
                            </div>
                            <div class="col-11">
                                <textarea class="form-control" id="profile-bio" rows="3" required placeholder="Enter your Profile Bio"
                                    name="profile_bio"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="memcheckins" role="tabpanel" aria-labelledby="nav-memcheckins-tab">
                    <h2>Member Check-ins</h2>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Membership ID</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Doe</td>
                                <td>John</td>
                                <td>7:30 PM</td>
                                <td>8:05 AM</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nonmem" role="tabpanel" aria-labelledby="nav-nonmem-tab">
                    <h2>Non-Member Entries</h2>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Membership ID</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Doe</td>
                                <td>John</td>
                                <td>7:30 PM</td>
                                <td>8:05 AM</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <div class="modal fade" id="edit_user" tabindex="-1" aria-labelledby="edit_userLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editUserLabel"></h1>
                            <button type="button" class="btn-close" data-bs-backdrop="static" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="updateForm" method="POST" action="{{route('update.Post')}}">
                                @csrf
                                <input type="hidden" name="userID" id="userID">
                                <div class="row">
                                    <div class="col-6"><label for="editUsername" class="form-label">Username: </label>
                                    </div>
                                    <div class="col-6"><label for="editUserType" class="form-label">User Type</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><input type="text" name="editUsername" id="editUsername"
                                            class="form-control"></div>
                                    <div class="col-6">
                                        <select name="editUserType" id="editUserType" class="form-select">
                                            <option value="1">Admin</option>
                                            <option value="2">User</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6"><label class="form-label" for="editFname">First Name: </label>
                                    </div>
                                    <div class="col-6"><label class="form-label" for="editLname">Last Name: </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><input type="text" name="editFname" id="editFname"
                                            class="form-control"></div>
                                    <div class="col-6"><input type="text" name="editLname" id="editLname"
                                            class="form-control"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6"><label class="form-label" for="editProfileBio">Profile Bio:
                                        </label></div>
                                    <div class="col-6"><label class="form-label" for="editContactNum">Contact Number:
                                        </label></div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <textarea name="editProfileBio" id="editProfileBio" class="form-control"></textarea>
                                    </div>
                                    <div class="col-6"><input type="tel" name="editContactNum" id="editContactNum"
                                            class="form-control"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6"><label class="form-label" for="editBirthdate">Birthdate: </label>
                                    </div>
                                    <div class="col-6"><label class="form-label" for="editMembershipType">Membership
                                            Type: </label></div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><input type="date" name="editBirthdate" id="editBirthdate"
                                            class="form-control"></div>
                                    <div class="col-6">
                                        <select name="editMembershipType" id="editMembershipType" class="form-select">

                                            <option value="1">Member</option>
                                            <option value="2">Non-Member</option>

                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6"><label class="form-label" for="editMembershipPlan">Membership
                                            Plan: </label></div>
                                    <div class="col-6"><label class="form-label" for="editMembershipDesc">Membership
                                            Description: </label></div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <select name="editMembershipPlan" id="editMembershipPlan" class="form-select">
                                            <option value="1">Basic</option>
                                            <option value="2">Standard</option>
                                            <option value="3">Premium</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <textarea name="editMembershipDesc" id="editMembershipDesc" class="form-control"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6"><label class="form-label" for="editWeight">Weight:</label></div>
                                    <div class="col-6"><label class="form-label" for="editHeight">Height:</label></div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><input type="number" name="editWeight" id="editWeight"
                                            step="0.01" class="form-control"></div>
                                    <div class="col-6"><input type="number" name="editHeight" id="editHeight"
                                            step="0.01" class="form-control"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6"><label class="form-label" for="editBMI">Body Mass Index:
                                        </label></div>
                                    <div class="col-6"><label class="form-label" for="editBMIType">Body Mass Index
                                            Classification: </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><input type="text" name="editBMI" id="editBMI"
                                            class="form-control" readonly="readonly"></div>
                                    <div class="col-6"><input type="text" name="editBMIType" id="editBMIType"
                                            class="form-control" readonly="readonly"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label" for="editAddressNum">Address Number: </label>

                                    </div>
                                    <div class="col-6"><label class="form-label" for="editAddressStreet">Address Street:
                                        </label></div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><input type="text" name="editAddressNum" id="editAddressNum"
                                            class="form-control"></div>
                                    <div class="col-6"><input type="text" name="editAddressStreet"
                                            id="editAddressStreet" class="form-control"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6"><label for="editAddressCity" class="form-label">Address
                                            City</label></div>
                                    <div class="col-6"><label for="editAddressRegion" class="form-label">Address
                                            Region</label></div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><input type="text" name="editAddressCity"
                                            id="editAddressCity" class="form-control"></div>
                                    <div class="col-6"><input type="text" name="editAddressRegion"
                                            id="editAddressRegion" class="form-control"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6"><label for="editEmail" class="form-label">Email: </label></div>
                                    <div class="col-6"><label for="editTrainer" class="form-label">Trainer</label></div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><input type="email" name="editEmail" id="editEmail"
                                            class="form-control"></div>
                                    <div class="col-6"><input type="text" name="editTrainer" id="editTrainer"
                                            class="form-control"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6"><label for="editStartDate" class="form-label">Start Date:
                                        </label></div>
                                    <div class="col-6"><label for="editExpiryDate" class="form-label">Expiry Date:
                                        </label></div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><input type="date" name="editStartDate" id="editStartDate"
                                            class="form-control"></div>
                                    <div class="col-6"><input type="date" name="editExpiryDate" id="editExpiryDate"
                                            class="form-control"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6"><label for="editNextPayment" class="form-label">Next Payment:
                                        </label></div>
                                    <div class="col-6"><label for="editPaymentStatus" class="form-label">Payment Status:
                                        </label></div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><input type="date" name="editNextPayment"
                                            id="editNextPayment" class="form-control"></div>
                                    <div class="col-6">
                                        <select name="editPaymentStatus" id="editPaymentStatus" class="form-control">
                                            <option value="1">Paid</option>
                                            <option value="2">Unpaid</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-6"><label for="editHasIllness" class="form-label">Has Illness:
                                        </label></div>
                                    <div class="col-6"><label for="editHasInjuries" class="form-label">Has
                                            Injuries</label></div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <select name="editHasIllness" id="editHasIllness" class="form-control">
                                            <option value="0">Yes</option>
                                            <option value="1">No</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <select name="editHasInjuries" id="editHasInjuries" class="form-control">
                                            <option value="0">Yes</option>
                                            <option value="1">No</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="row"><label for="editMedicalHistory" class="form-label">Medical
                                            History</label></div>
                                    <div class="row">
                                        <textarea name="editMedicalHistory" id="editMedicalHistory" class="form-control"></textarea>
                                    </div>
                                </div>
                                <br>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="submitUpdateForm" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(session('user')->user_type == 'user')
            <h1>Not implemented -Happy 2.0 Friends</h1>
        @endif
    @else
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
            Login
        </button>

        <!-- Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="loginModalLabel">Login</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('login.Post') }}" method="post">
                            @csrf
                            <div class="row text-center">
                                <label for="username" class="form-label">Username: </label>
                            </div>
                            <div class="row"><input type="text" name="username" id="username"
                                    placeholder="Enter your username" class="form-control" required></div>
                            <br>
                            <div class="row text-center">
                                <label for="password" class="form-label">Password: </label>
                            </div>
                            <div class="row"><input type="password" name="password" id="password"
                                    placeholder="Enter your password" class="form-control" required></div>
                            <br>
                            <div class="row"><button type="submit" class="btn btn-primary">Login</button></div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endif

@endsection
