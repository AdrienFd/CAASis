<!-- Nav panel -->
<div id="navPanel" class="navPanel">
    <nav>
        <!-- Connect and register links -->

        <ul class="authentification">
            @if(Auth::check())
            <a >Disconnect</a>
            @else
            <button class="connect"><a href="">Connect</a></button>
            <a> | </a>
            <button class="register" ><a href="register">Register</a></button>
            @endif
        </ul>
        <!-- Links to others pages -->
        <ul class="links">
            <a href="event">Events</a>
            <a href="shop">Shop</a>
            <a href="idea">Idea Box</a>
            <a href="index">Home</a>
            <a href="">Legal Mentions</a>
        </ul>
        <!-- Button to close the nav panel -->
        <a href="#navPanel" class="close">&#x2716</a>
    </nav>
 </div>