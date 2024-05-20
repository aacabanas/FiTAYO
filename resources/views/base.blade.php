<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if (auth()->user()==null||auth()->user()->user_type == "user")
        @vite(['resources/js/user/app.js'])
    @else
        @vite(['resources/js/admin/app.js'])
    @endif
    @vite(['resources/sass/app.scss', 'resources/css/app.css'])
    <title>@yield('title')</title>
</head>

<body>
    


    @if (View::getSection('title') == 'Login' )
        <div class="container-fluid d-flex my-auto mx-auto align-items-center justify-content-center" style="height:75vh">
            
            @yield('content')
            
            

    </div>
    <footer>
        <div class="row d-flex my-auto mx-auto align-items-center justify-content-center">
            
            <img src="{{asset('images/apc_logo.jpg')}}" alt="APC Logo" class="logo">
            <img src="{{asset('images/stamina_fitness.jpg')}}" alt="APC Logo" class="logo">
        </div>
        

    <div class="row d-flex my-auto mx-auto align-items-center justify-content-center">
        © 2024. All Rights Reserved
     </div>
     <div class="row d-flex my-auto mx-auto align-items-center justify-content-center">Built with Laravel,Bootstrap,jQuery</div>
</footer>

    
    
    @else
    <div class="container-fluid">
        
        @yield('content')
        
        
    </div>
    <br><br>
    <footer>
        <div class="row d-flex my-auto mx-auto align-items-center justify-content-center">
            
            <img src="{{asset('images/apc_logo.jpg')}}" alt="APC Logo" class="logo">
            <img src="{{asset('images/stamina_fitness.jpg')}}" alt="APC Logo" class="logo">
        </div>
        

    <div class="row d-flex my-auto mx-auto align-items-center justify-content-center">
        © 2024. All Rights Reserved
     </div>
     <div class="row d-flex my-auto mx-auto align-items-center justify-content-center">Built with Laravel,Bootstrap,jQuery</div>
</footer>
    @endif
    
</body>

</html>
