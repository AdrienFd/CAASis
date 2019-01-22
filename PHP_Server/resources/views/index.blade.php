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

    <!-- Links -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />


</head>

<body>

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


            <!-- Nav -->
            <button href="#navPanel" class="menu_button">&#x2630</button>
        </header>



        <div id="navPanel" class="navPanel">
            <nav>
                <ul class="authentification">
                    <a href="">Connect</a>
                    <a> | </a>
                    <a href="">Register</a>

                </ul>
                <ul class="links">
                    <a href="event">Events</a>
                    <a href="shop">Shop</a>
                    <a href="">Idea Box</a>
                    <a href="index">Home</a>
                    <a href="">Legal Mentions</a>
                </ul>
                <a href="#navPanel" class="close">&#x2716</a>
            </nav>
        </div>

        <!-- Content of each page -->
        <main class="content">
            <!-- BG -->
            <div id="bg"></div>


            <div class="section">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga eum nihil suscipit dolorum! Blanditiis
                nisi qui
                delectus veniam expedita, possimus ad eius exercitationem voluptates numquam molestiae, quae, a sit
                cupiditate.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Et accusamus hic, nobis nihil dicta error?
                Similique porro
                recusandae officia velit aliquid blanditiis dignissimos non facilis minima. Rerum assumenda distinctio
                eius?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus magni quis maiores distinctio eligendi
                quos pariatur
                laborum necessitatibus quas sapiente ea, sed in vitae. Numquam aperiam provident laudantium molestiae
                mollitia!
            </div>

            <div class="section">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga eum nihil suscipit dolorum! Blanditiis
                nisi qui
                delectus veniam expedita, possimus ad eius exercitationem voluptates numquam molestiae, quae, a sit
                cupiditate.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Et accusamus hic, nobis nihil dicta error?
                Similique porro
                recusandae officia velit aliquid blanditiis dignissimos non facilis minima. Rerum assumenda distinctio
                eius?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus magni quis maiores distinctio eligendi
                quos pariatur
                laborum necessitatibus quas sapiente ea, sed in vitae. Numquam aperiam provident laudantium molestiae
                mollitia!
            </div>

            <div class="section">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga eum nihil suscipit dolorum! Blanditiis
                nisi qui
                delectus veniam expedita, possimus ad eius exercitationem voluptates numquam molestiae, quae, a sit
                cupiditate.
            </div>

            <div class="section">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga eum nihil suscipit dolorum! Blanditiis
                nisi qui
                delectus veniam expedita, possimus ad eius exercitationem voluptates numquam molestiae, quae, a sit
                cupiditate.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Et accusamus hic, nobis nihil dicta error?
                Similique porro
                recusandae officia velit aliquid blanditiis dignissimos non facilis minima. Rerum assumenda distinctio
                eius?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus magni quis maiores distinctio eligendi
                quos pariatur
                laborum necessitatibus quas sapiente ea, sed in vitae. Numquam aperiam provident laudantium molestiae
                mollitia!
            </div>

            <div class="links">
            </div>
        </main>
    </div>

    <script type="text/javascript" src="{{asset('js/animes.js')}}"></script>

    <!-- footer -->
    <footer>
        <div class="footer">
            <a>@CAASis Team</a>
            <a> | </a>
            <a> 2019</a>
        </div>
    </footer>

</body>

</html>
