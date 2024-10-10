@extends('base')
@section('title', 'Home')
@section('js_vite_loader')
    @vite(['resources/css/app.css','resources/js/guest/home.js'])
@endsection
@section('content')
<style>
    .login-container {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .login-header {
        margin-bottom: 30px;
    }

    .login-header h3 {
        font-size: 24px;
        font-weight: bold;
        color: #000;
    }

    .login-form label {
        font-weight: bold;
    }

    .login-form .btn {
        width: 100%;
    }

    .forgot-password {
        margin-top: 10px;
    }

    .alert {
        margin-top: 20px;
    }
</style>
    <div class="container align-items-center justify-content-center d-flex mt-5">
        <div class="row text-center mt-5">
            <p class="d-none" id="login_csrf">  {{csrf_token()}}</p>
            <p class="d-none" id="reg_csrf">    {{csrf_token()}}</p>
            <p class="d-none" id="login_route"> {{route("login_post")}}</p>
            <p class="d-none" id="reg_route">   {{route("register_post")}}</p>

            <div class="col-6 mw-100"><button class="btn btn-primary" id="register">Register</button></div>
            <div class="col-6 mw-100"><button class="btn btn-secondary" id="login" >Login</button></div>
        </div>
    </div>
@endsection



