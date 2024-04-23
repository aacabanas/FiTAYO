@extends('layout')
@if (session('user') == 'admin')
    @section('title', 'FiTAYO - Member Management Dashboard')
@elseif (session('user') == 'user')
    @section('title', 'FiTAYO - Member Dashboard')
@else
    @section('title', 'Home')
@endif




@section('content')
    <div class="container">
        @if (session()->has('user'))
            @if (session('user') == 'admin')
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
                        <a class="nav-link " id="nav-memcheckins-tab" data-bs-toggle="tab" href="#memcheckins"
                            role="tab" aria-controls="memcheckins" aria-selected="false">Member Check-ins</a>

                    </div>
                    <div class="col-2 border-dark">
                        <a class="nav-link" id="nav-nonmem-tab" data-bs-toggle="tab" href="#nonmem" role="tab"
                            aria-controls="nonmem" aria-selected="false">Non-member Entries</a>

                    </div>
                    <div class="col-2 border-dark">
                        <span class="text-center justify-content-center">Hello {{ session('name') }}</span>
                    </div>
                </div><br>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="dashboard" role="tabpanel"
                        aria-labelledby="nav-dashboard-tab">
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
                            <div class="col-4">
                                <h2>Members List</h2>

                            </div>
                            <table class="table table-hover">
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
                                    <tr>
                                        <td>1</td>
                                        <td>Doe</td>
                                        <td>John</td>
                                        <td>Premium</td>
                                        <td>Jan xx, xxxx</td>
                                        <td>Feb xx, xxxx</td>
                                        <td>Paid</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="newmemb" role="tabpanel" aria-labelledby="nav-newmemb-tab">
                        <h2>Register New Member</h2>
                        <form action="#">
                            <div class="row">
                                <div class="col-1 text-center ">
                                    <label for="first-name" class="form-label">First Name:</label>
                                </div>
                                <div class="col-5 border-right-black">
                                    <input type="text" class="form-control" id="first-name" required
                                        placeholder="Enter your First Name">
                                </div>
                                <div class="col-1 text-center">
                                    <label for="last-name" class="form-label">Last Name:</label>
                                </div>
                                <div class="col-5">
                                    <input type="text" class="form-control" id="last-name" required
                                        placeholder="Enter your Last Name">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-1 text-center">
                                    <label for="contact-number" class="form-label">Contact Number: </label>
                                </div>
                                <div class="col-5">
                                    <input type="tel" name="contact-number" id="contact-number" class="form-control"
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
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-2 text-center">
                                            <label for="membership-plan" class="form-label">Membership Plan:</label>
                                        </div>
                                        <div class="col-6">
                                            <select name="membership-plan" id="membership-plan" class="form-select">
                                                <option selected="">Select Membership Plan</option>
                                                <option value="1">Basic</option>
                                                <option value="2">Standard</option>
                                                <option value="3">Premium</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-1 text-center">
                                    <label for="username" class="form-label">Username:</label>
                                </div>
                                <div class="col-5">
                                    <input type="text" class="form-control" id="username" required
                                        placeholder="Enter your Username">
                                </div>
                                <div class="col-1 text-center">
                                    <label for="password" class="form-label">Password:</label>
                                </div>
                                <div class="col-5">
                                    <input type="password" class="form-control" id="password" required
                                        placeholder="Enter your Password">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-1 text-center">
                                    <label for="birthdate" class="form-label">Birthdate:</label>
                                </div>
                                <div class="col-5">
                                    <input type="date" class="form-control" id="birthdate" required>
                                </div>
                                <div class="col-1 text-center">
                                    <label for="address-num" class="form-label">Address Number:</label>
                                </div>
                                <div class="col-5">
                                    <input type="text" class="form-control" id="address-num" required
                                        placeholder="Enter your Address Number">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-1 text-center">
                                    <label for="address-street" class="form-label">Address Street:</label>
                                </div>
                                <div class="col-5">
                                    <input type="text" class="form-control" id="address-street" required
                                        placeholder="Enter your Address Street">
                                </div>
                                <div class="col-1 text-center">
                                    <label for="address-city" class="form-label">Address City:</label>
                                </div>
                                <div class="col-5">
                                    <input type="text" class="form-control" id="address-city" required
                                        placeholder="Enter your Address City">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-1 text-center">
                                    <label for="address-region" class="form-label">Address Region:</label>
                                </div>
                                <div class="col-5">
                                    <input type="text" class="form-control" id="address-region" required
                                        placeholder="Enter your Address Region">
                                </div>
                                <div class="col-1 text-center">
                                    <label for="height" class="form-label">Height:</label>
                                </div>
                                <div class="col-5">
                                    <input type="number" step="0.01" class="form-control" id="height" required
                                        placeholder="Enter your Height">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-1 text-center">
                                    <label for="weight" class="form-label">Weight:</label>
                                </div>
                                <div class="col-5">
                                    <input type="number" step="0.01" class="form-control" id="weight" required
                                        placeholder="Enter your Weight">
                                </div>
                                <div class="col-1 text-center">
                                    <label for="medical-history" class="form-label">Medical History:</label>
                                </div>
                                <div class="col-5">
                                    <textarea class="form-control" id="medical-history" rows="3" required
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
                                        <input class="form-check-input" type="radio" name="hasIllness"
                                            id="hasIllnessYes" value="1">
                                        <label class="form-check-label" for="hasIllnessYes">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="hasIllness"
                                            id="hasIllnessNo" value="0" checked>
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
                                        <input class="form-check-input" type="radio" name="hasInjuries"
                                            id="hasInjuriesNo" value="0" checked>
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
                                    <select name="user-type" id="user-type" class="form-select" required>
                                        <option selected="">Select User Type</option>
                                        <option value="1">User</option>
                                        <option value="2">Admin</option>
                                    </select>
                                </div>
                                <div class="col-1 text-center">
                                    <label for="membership-type" class="form-label">Membership Type:</label>
                                </div>
                                <div class="col-5">
                                    <select name="membership-type" id="membership-type" class="form-select" required>
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
                                    <input type="text" class="form-control" id="membership-desc" required
                                        placeholder="Enter your Membership Description">
                                </div>
                                <div class="col-1 text-center">
                                    <label for="start-date" class="form-label">Start Date:</label>
                                </div>
                                <div class="col-5">
                                    <input type="date" class="form-control" id="start-date" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-1 text-center">
                                    <label for="expiry-date" class="form-label">Expiry Date:</label>
                                </div>
                                <div class="col-5">
                                    <input type="date" class="form-control" id="expiry-date" required>
                                </div>
                                <div class="col-1 text-center">
                                    <label for="next-payment" class="form-label">Next Payment:</label>
                                </div>
                                <div class="col-5">
                                    <input type="date" class="form-control" id="next-payment" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-1 text-center">
                                    <label for="payment-status" class="form-label">Payment Status:</label>
                                </div>
                                <div class="col-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment-status"
                                            id="payment-status-paid" value="1" checked>
                                        <label class="form-check-label" for="payment-status-paid">
                                            Paid
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment-status"
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
                                    <input type="text" class="form-control" id="trainer" required
                                        placeholder="Enter your Trainer">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-1 text-center">
                                    <label for="profile-bio" class="form-label">Profile Bio:</label>
                                </div>
                                <div class="col-11">
                                    <textarea class="form-control" id="profile-bio" rows="3" required placeholder="Enter your Profile Bio"></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <button type="button" onclick='alert("not yet implemented -Happy 2.0 Friends")'
                                        class="btn btn-primary">Submit</button>
                                </div>
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
    @endif
@elseif (session('user') == 'user')
    <h1>
        this is not yet implemented as it is still in development -Happy 2.0 Friends
    </h1>
@else
    <a href="{{ route('login') }}"><button class="btn btn-primary">Login</button></a>
    @endif

    </div>

    {{-- 
    Put frontend code here    
--}}
@endsection
