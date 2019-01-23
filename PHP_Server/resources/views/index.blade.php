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

    <!-- Nav button -->
    <button href="#navPanel" class="menu_button">&#x2630</button>
    </header>

    <!-- Nav panel -->
    <div id="navPanel" class="navPanel">
        <nav>
            <!-- Connect and register links -->
            <ul class="authentification">
                <a href="">Connect</a>
                <a> | </a>
                <a href="">Register</a>

            </ul>
            <!-- Links to others pages -->
            <ul class="links">
                <a href="event">Events</a>
                <a href="shop">Shop</a>
                <a href="">Idea Box</a>
                <a href="index">Home</a>
                <a href="">Legal Mentions</a>
            </ul>
            <!-- Button to close the nav panel -->
            <a href="#navPanel" class="close">&#x2716</a>
        </nav>
    </div>

    <!-- Content of each page -->
    <main class="content">
        <!-- Background image -->
        <div id="bg"></div>
        <!-- Container of the 2 sections -->
        <div class="container">

            <!-- WebSite's description -->
            <div class="section left">
                <h2>Description</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga eum nihil suscipit dolorum!
                    Blanditiis
                    nisi qui
                    delectus veniam expedita, possimus ad eius exercitationem voluptates numquam molestiae, quae, a
                    sit
                    cupiditate.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Et accusamus hic, nobis nihil dicta
                    error?</p>

                <p>Similique porro
                    recusandae officia velit aliquid blanditiis dignissimos non facilis minima. Rerum assumenda
                    distinctio
                    eius?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus magni quis maiores distinctio
                    eligendi
                    quos pariatur
                    laborum necessitatibus quas sapiente ea, sed in vitae. Numquam aperiam provident laudantium
                    molestiae
                    mollitia!</p>
            </div>
            <!-- Location image, to replace with the google map's api -->
            <div class="section right">
                <h2>Locations</h2>
                <img src="/img/location.png">
            </div>
        </div>
    </main>
    
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
