@extends('base')
@section('title', 'Home')

@section('content')
    <div class="container align-items-center justify-content-center d-flex mt-5">
        <div class="row text-center mt-5">
            <div class="col-6 mw-100"><button type="home" class="btn btn-primary" targets="{{route('register_get')}}">Register</button></div>
            <div class="col-6 mw-100"><button type="home" class="btn btn-secondary" targets="{{route('login_get')}}">Login</button></div>
        </div>
    </div>
@endsection
@section('script')
    <script type="module">
        $("button[type='home']").on('click', function(e) {
            e.preventDefault()
            window.location.href = $(this).attr("targets")
        })
    </script>
@endsection
