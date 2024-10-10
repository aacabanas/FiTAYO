@extends('base')
@section('title', 'Dashboard')
@section('js_vite_loader')
    @vite(['resources/css/app.css','resources/css/admin/app.css', 'resources/js/admin/app.js','resources/js/app.js'])
@endsection
@section('content')
    <div class="container-fluid">
        <div id="test" {{-- class="d-none" --}}>
            <button id="test-btn" msg="Hello World">
                Test Fire
            </button>
            <p class="bg bg-danger"></p>
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
                <p id="time"></p>
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Monthly New Members</h5>
                                <p class="card-text">
                                    {{ \App\Models\user_membership::whereMonth('created_at', '=', date('m'))->count() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Daily Check-in</h5>
                                <p class="card-text">
                                    {{ \App\Models\checkins::where('date', \Carbon\Carbon::now()->format('Y-m-d'))->count() }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Guests Today</h5>
                                <p class="card-text">
                                    {{ \App\Models\NonMemberModel::whereDate('date', \Carbon\Carbon::now()->format('Y-m-d'))->count() }}
                                </p>
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
    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="memberlist" role="tabpanel" aria-labelledby="nav-memberlist">
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
                            <div class="col-4">
                                <div class="input-group">

                                    <input type="text" id="search_member" class="form-control"
                                    placeholder="Search for member">
                                <button class="btn btn-primary" id="refresh"><i class="fa-solid fa-arrows-rotate"></i></button>
                                </div>
                            </div>
    
                        </div>
                        <br>
                        <div class="row">
    
                            <table class="table table-hover text-center" id="mem-list">
                                <thead>
                                    <tr>
                                        <th>Membership ID</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                        <th></th>    
                                    </tr>
                                </thead>
                                <tbody id="members-list">
    
                                </tbody>
                            </table>
                        </div>
    
    
    
                    </div>
                    <div class="tab-pane fade" id="nonmemlist" role="tabpanel" aria-labelledby="nav-nonmemlist">
                        <br>
                        <div class="row">
                            <div class="col-8">
                                <h2>Non-Members
                                    List({{ DateTime::createFromFormat('!m', date('m'))->format('F') . ' ' . date('d Y') }})
                                </h2>
    
                            </div>
    
    
    
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="text" id="search_non_member" class="form-control"
                                            placeholder="Search for non-member">
                                    </div>
    
                                    <div class="col-6">
                                        <button class="btn btn-secondary" data-bs-toggle="modal"
                                            data-bs-target="#nonmemberregistermodal">Register Non-Member</button>
                                    </div>
    
    
                                </div>
                            </div>
                            <br>
    
    
    
    
                        </div>
                        <br>
                        <table class="table table-striped" id="non-mem-list">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Time-in</th>
                                </tr>
                            </thead>
                            <tbody id="non-members-list">

                            </tbody>
                        </table>
    
                    </div>
    
                </div>
    
    
    
            </div>
    
    
            <div class="tab-pane fade" id="check" role="tabpanel" aria-labelledby="nav-check">
                <div class="container">
    
                    <div id="qr-reader"></div>
                    <br>
    
                </div>
                <div class="container">
                    <div id="qr-result">
                        <div class="row">
                            <h4 id="username"></h4>
                            <div class="d-none" id="user_id"></div>
                            <p class="d-none" id="usern"></p>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-success" id="cin">Check-in</button>
    
                            </div>
                            <div class="col-6">
                                <button class="btn btn-danger" id="cout">Check-out</button>
                            </div>
                        </div>
                    </div>
                    @if (session()->has('check_in'))
                        <script>
                            alert("{{ $check_in }}")
                        </script>
                    @endif
    
                </div>
            </div>
            <div class="row">
    
            </div>
    
        </div>
    
    
        </div>
        </div>
        </div>
    </div>
    
    <div class="modal fade" id="nonmemberregistermodal" tabindex="-1" aria-labelledby="nonmemberregistermodalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="nonmemberregistermodalLabel">
                        Non Member Registration
                    </h3>
                </div>
                <div class="modal-body">
                    <form action="{{ route('register_non_mem') }}" method="post" class="form-control">
                        @csrf
                        <label for="firstname">First Name:</label>
                        <input type="text" name="firstname" id="firstname" class="form-control">
                        <br>
                        <label for="lastname">Last Name:</label>
                        <input type="text" name="lastname" id="lastname" class="form-control">
                        <br>
                        <button type="submit" class="btn btn-success">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="memberModal" tabindex="-1" aria-labelledby="memberModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="memberModalLabel">Member Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close_modal"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs" id="memberTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile"
                                role="tab" aria-controls="profile" aria-selected="true">Profile</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="membership-tab" data-bs-toggle="tab" href="#membership"
                                role="tab" aria-controls="membership" aria-selected="false">Membership</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="assessment-tab" data-bs-toggle="tab" href="#assessment"
                                role="tab" aria-controls="assessment" aria-selected="false">Assessment</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="bmi-tab" data-bs-toggle="tab" href="#bmi" role="tab"
                                aria-controls="bmi" aria-selected="false">BMI Records</a>
                        </li>
                    </ul>

                    <div class="tab-content mt-3" id="memberTabsContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        </div>
                        <div class="tab-pane fade" id="membership" role="tabpanel" aria-labelledby="membership-tab">
                        </div>
                        <div class="tab-pane fade" id="assessment" role="tabpanel" aria-labelledby="assessment-tab">
                        </div>
                        <div class="tab-pane fade" id="bmi" role="tabpanel" aria-labelledby="bmi-tab">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Height</th>
                                        <th>Weight</th>
                                        <th>BMI</th>
                                        <th>BMI Classification</th>
                                    </tr>
                                </thead>
                                <tbody id="bmi_records">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        id="alt_close">Close</button>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit User Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Tabs Navigation -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="profile-edit-tab" data-bs-toggle="tab" href="#profile-edit" role="tab" aria-controls="profile-edit" aria-selected="true">Profile Edit</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="assessment-edit-tab" data-bs-toggle="tab" href="#assessment-edit" role="tab" aria-controls="assessment-edit" aria-selected="false">Assessment Edit</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="membership-edit-tab" data-bs-toggle="tab" href="#membership-edit" role="tab" aria-controls="membership-edit" aria-selected="false">Membership Edit</a>
                        </li>
                    </ul>
    
                    <!-- Tabs Content -->
                    <div class="tab-content mt-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile-edit" role="tabpanel" aria-labelledby="profile-edit-tab">
                            <form id="profileEditForm">
                                @csrf
                                <div class="row">
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="email" name="email" id="email" class="form-control" placeholder="">
                            <label for="email">Enter your Email</label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" name="username" id="username" class="form-control" placeholder="">
                            <label for="username">Enter your Username</label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="password" name="password" id="password" class="form-control" placeholder="">
                            <label for="password">Enter your Password</label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="password" name="password_confirmation" id="confirm-password" class="form-control"
                                placeholder="">
                            <label for="confirm-password">Confirm your Password</label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row text-center border border-primary">
                    <h5>Profile</h5>
                </div>
                <br>
                <div class="row">
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="">
                            <label for="firstname">Enter your First Name</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="">
                            <label for="lastname">Enter your Last Name</label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="date" name="birthdate" id="birthdate" class="form-control" placeholder="">
                            <label for="birthdate">Enter your Birthdate</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="tel" name="contactnum" id="contactnum" class="form-control" placeholder=""
                                minlength="10" maxlength="11">
                            <label for="contactnum">Enter your contact number</label>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6">

                        <div class="form-floating">
                            <select name="region" id="region" class="form-control" required="required" placeholder>
                                <option region_code="None">Choose a Region</option>
                            </select>
                            <label for="region">Region</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <select name="city" id="city" class="form-control" required="required" placeholder>
                                <option city_code="None">Choose a City</option>
                            </select>
                            <label for="city">City:&nbsp;</label>
                        </div>


                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6">
                        <div class="form-floating">
                            <select name="barangay" id="barangay" class="form-control" required="required" placeholder>
                                <option>Choose a Barangay</option>
                            </select>
                            <label for="barangay">Barangay</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="text" name="streetnum" id="streetnum" class="form-control"
                                required="required" placeholder>
                            <label for="streetnum">Street No./Street</label>
                        </div>
                    </div>
                </div>
                        
                            </form>
                        </div>
                        <div class="tab-pane fade" id="assessment-edit" role="tabpanel" aria-labelledby="assessment-edit-tab">
                            <form id="assessmentEditForm">
                                <div class="mb-3">
                                    <label for="assessmentScore" class="form-label">Assessment Score</label>
                                    <input type="number" class="form-control" id="assessmentScore" required>
                                </div>
                                <div class="mb-3">
                                    <label for="assessmentComments" class="form-label">Comments</label>
                                    <textarea class="form-control" id="assessmentComments" rows="3" required></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="membership-edit" role="tabpanel" aria-labelledby="membership-edit-tab">
                            <form id="membershipEditForm">
                                <div class="mb-3">
                                    <label for="membershipType" class="form-label">Membership Type</label>
                                    <select class="form-select" id="membershipType" required>
                                        <option value="" disabled selected>Select membership type</option>
                                        <option value="basic">Basic</option>
                                        <option value="premium">Premium</option>
                                        <option value="vip">VIP</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="membershipStatus" class="form-label">Status</label>
                                    <select class="form-select" id="membershipStatus" required>
                                        <option value="" disabled selected>Select status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveButton">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="module">
        window._load_users();
        window._load_non_mem();
    </script>
@endsection
