<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>

<body>
    


    @if (View::getSection('title') == 'Login' )
        <div class="container d-flex my-auto mx-auto align-items-center justify-content-center" style="height:100vh">
            
            @yield('content')

    </div>
    @else
    <div class="container">
        
        @yield('content')
    </div>
    
    @endif

</body>

</html>
