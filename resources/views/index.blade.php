@extends('layout')
@if (session('user') == 'admin')
    @section('title', 'FiTAYO - Member Management Dashboard')
@elseif (session('user')== 'user')
@section('title', "FiTAYO - Member Dashboard")
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
                        <span>Hello {{ session('name') }}</span>
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
                            <div class="row"><button type="button" onclick='alert("not yet implemented -Happy 2.0 Friends")' class="btn btn-primary">Submit</button></div>
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
    @if (session('user') == 'user')
    <h1>
        this is not yet implemented as it is still in development -Happy 2.0 Friends
    </h1>
        
    @endif

    @endif

    </div>

    {{-- 
    Put frontend code here    
--}}
@endsection
