<?php

$URL = $_SERVER['REQUEST_URI'];
$PAGE = basename($URL);

$TYPE = array ('none', 'none', 'none', 'none');

//Gestion des boutons actifs dans la navbar
switch($PAGE) {
        case ("home"): 
                $TYPE[0] = '"active"';
        break;
        case ("events"): 
                $TYPE[1] = '"active"';
        break;
}

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CAASis's Project</title>

    <!-- Styles -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />

</head>

<body>
    <header>
        <div class=before_navbar>
            <h1>BDE's Website</h1>
        </div>

        <nav class="topnav">
            <a class=<?php echo $TYPE[0]?> href="home">Home</a>
            <a class=<?php echo $TYPE[1]?> href="workshop.php">Events</a>

        </nav>

    </header>

    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">

            @yield('content')


            <div class="links">

            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('js/articles.js')}}"></script>
</body>

</html>
