<!-- Nav button -->
<button class="menu_button" onclick="open_menu()">&#x2630</button>


<!-- Nav panel -->
<div id="navPanel" class="navPanel">
    <nav>
        <!-- Connect and register links -->
        <ul class="authentification">
            @if(Auth::check())
            <li>
                <a href="logout">Se déconnecter</a>
            </li>
            @else
            <li class="connect">
                <a href="#connect" onclick="open_connection()">Connexion</a>
            </li>
            <li class="register">
                <a href="register" onclick="open_register()">Inscription</a>
            </li>
            @endif
        </ul>
        <!-- Links to others pages -->
        <ul class="links">
            <li><a href="home">Acceuil</a><li>
            <li><a href="idea">Boîte à idées</a><li>
            <li><a href="event">Évenements</a><li>
            <li><a href="shop">Boutique</a><li>
            <li><a href="">Mentions légal</a><li>
        </ul>
        <!-- Button to close the nav panel -->
        <a class="close" onclick="close_menu()">&#x2716</a>
    </nav>
 </div>