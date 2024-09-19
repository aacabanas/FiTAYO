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
                        <div class="col-4"><input type="text" id="search_member" class="form-control"
                                placeholder="Search for member"></div>

                    </div>
                    <br>
                    <div class="row">

                        <table class="table table-hover text-center" id="mem-list">
                            <thead>
                                <tr>
                                    <th>Membership ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th colspan="5">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach (\App\Models\User::where('user_type', 'user')->get() as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <button class="btn btn-primary">View</button>
                                        </td>
                                        <td>
                                            <select class="form-select" id="membership" {{$user->payment_status? "disabled" : ""}}>
                                                <option value="0">Select Membership</option>
                                                <option value="Basic">Basic</option>
                                                <option value="Premium">Premium</option>
                                            </select>
                                        </td>
                                        <td>
                                            <button membership="0" type="memb-set" class="btn btn-success {{$user->payment_status? "disabled" : ""}}" id="set_membership"  user_id="{{$user->id}}">Set Membership</button>
                                        </td>
                                        
                                    </tr>
                                @endforeach
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
                                        data-bs-target="#nonmemberregistermodal">Register Non-Member</button:button>
                                </div>


                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <table>
                                <thead>
                                    <th>
                                        <td>First Name</td>
                                        <td>Last Name</td>
                                        <td>Time in</td>
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach (\App\Models\NonMemberModel::where('date', \Carbon\Carbon::now()->toDateString())->get() as $data)
                                
                                    <tr>
                                        <td class="col">{{ $data->firstname }}</td>
                                        <td class="col">{{ $data->lastname }}</td>
                                        <td class="col">{{ $data->time_in }}</td>
                                    </tr>
                                    
                                
                            @endforeach
                                </tbody>
                            </table>
                            @foreach (\App\Models\NonMemberModel::where('date', \Carbon\Carbon::now()->toDateString())->get() as $data)
                                <div class="row">
                                    <div class="col">{{ $data->firstname }}</div>
                                    <div class="col">{{ $data->lastname }}</div>
                                    <div class="col">{{ $data->time_in }}</div>
                                </div>
                            @endforeach

                        </div>
                    </div>
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
@endsection
@section('script')
    <script type="module">
        var qr = new QR('qr-reader', {
            fps: 20,
            qrbox: {
                width: 250,
                height: 250
            }
        })
        $("a.nav-tabs").on("click",(e)=>{
            e.preventDefault()
            console.log($(this))
        })
        $("#membership").on("change",(e)=>{
            var mem = $("#membership").val()
                $("#set_membership").attr("membership",`${mem}`)

        })  
        /* if($("#check").hasClass("show")){
            qr.render((data) => {

            var decoded = JSON.parse(b64.decode(data))
            $("#username").text(`Username: ${decoded.username}`)
            $("#usern").text(decoded.username)
            $("#user_id").text(decoded.id)
            

        })
        } */
        
        $("#cin").on("click",(e)=>{
            e.preventDefault();
            const url = `{{route('cin')}}?username=${$("#usern").text()}&id=${$("#user_id").text()}`
            $.getJSON(url,(data)=>{
                alert(data.check_in)
            })
            $("#username").text("")
            $("#usern").text("")
            $("#user_id").text("")
        })
        $("#cout").on("click",(e)=>{
            e.preventDefault();
            const url = `{{route('cout')}}?username=${$("#usern").text()}&id=${$("#user_id").text()}`
            $.getJSON(url,(data)=>{
                alert(data.check_out)
            })
            $("#username").text("")
            $("#usern").text("")
            $("#user_id").text("")
        })
        setInterval(() => {
            var date = new Date()
            $("#time").text(new Date(Date.UTC(
                    date.getFullYear(),
                    date.getMonth(),
                    date.getDate(),
                    date.getHours(),
                    date.getMinutes(),
                    date.getSeconds()
                )).toTimeString())
        }, 1000);
        
    </script>
@endsection
