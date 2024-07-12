<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @if (Auth::check())
    <div class="header mb-3 d-flex align-items-center justify-content-end">
        <nav class="">
            <ul class="d-flex">
                <li class="nav-item user-index"><span>{{ Auth::user()->name}}</span></li>
                <li class="nav-item"><a href={{ route('logout') }}><i class='bx bx-log-out' ></i></a></li>
            </ul>
        </nav>
    </div>
    
    @endif
    <div class="container-fluid">
        @if (Auth::check())
            <div class="container-fluid">
                @yield('page-content')
            </div>
        @else
            <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
                @yield('auth-content')
            </div>
        @endif
    </div>
</body>
</html>