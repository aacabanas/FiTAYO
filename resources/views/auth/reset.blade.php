@extends('base')
@section('title','Reset Password')

@section('content')
    <div class="container align-items-center justify-content-center">

        @for($i=0;$i<13;$i++)
            <br>
        @endfor
        <div class="row ">
            <div class="col-5"></div>
            <div class="col-2"><h4>Reset Password</h4></div>
            <div class="col-5"></div>
            
        </div>
        <form action="{{route('reset_pass')}}" method="post">
            @csrf
            <input type="hidden" name="token" value="{{Request::get('token')}}">
            <div class="row ">
                <div class="col-2"><label for="password" class="form-label">Password</label></div>
                <div class="col-10"><input type="password" name="password" id="password" class="form-control" placeholder="Enter new Password"></div>
            </div>
            <br>
            <div class="row ">
                <div class="col-2"><label for="password" class="form-label">Confirm Password</label></div>
                <div class="col-10"><input type="password" name="confpassword" id="confpassword" class="form-control" placeholder="Confirm Password"></div>
            </div>
            <br>
            <div class="row">
                <button type="submit" class="btn btn-primary">Update Password</button>

            </div>
        </form>

    </div>
    
@endsection