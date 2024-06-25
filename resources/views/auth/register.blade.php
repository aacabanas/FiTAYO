@extends("base")
@section("title","Register")

@section("content")
<style>
    .register-container{
        max-width: 500px;
        
    }
</style>
<div class="container mt-5 register-container">
    <div class="row text-center">
        <h2>
            Registration
        </h2>
    </div>
    
    <form action="" method="post">
        @csrf
        <div class="row">
            <div class="form-floating">
                <input type="text" name="username" id="username" class="form-control" placeholder="">
                <label for="username">&nbsp;Username</label>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-floating">
                <input type="text" name="email" id="email" class="form-control" placeholder="">
                <label for="email">&nbsp;Email</label>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="form-floating">
                <input type="password" name="password" id="password" class="form-control" placeholder="">
                <label for="password">&nbsp;Password</label>
            
            </div>
        </div>
        <br>
        <div class="row">
            <button type="submit" class="btn btn-success">Register</button>
        </div>
    </form>
</div>

@endsection
