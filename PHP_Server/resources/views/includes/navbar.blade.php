<!-- Nav button -->
<button class="menu_button" onclick="open_menu()">&#x2630</button>


<!-- Nav panel -->
<div id="navPanel" class="navPanel">
    <nav>
        <!-- Connect and register links -->
        <ul class="authentification">
            @if(Auth::check())
            <li>
                <a href="{{ route('logout') }}">Déconnexion</a>
                <a href="{{ route('changePSW') }}">Changer mdp</a>
            </li>
            @else
            <li class="connect">
                <a href="#connect" onclick="open_connection()">Connexion</a>
            </li>
            <li class="register">
                <a href="{{ route('register') }}" onclick="open_register()">Inscription</a>
            </li>
            @endif
        </ul>
        <!-- Links to others pages -->
        <ul class="links">
            <li><a href="{{ route('home') }}">Accueil</a><li>
            <li><a href="{{ route('ideas') }}">Boîte à idées</a><li>
            <li><a href="{{ route('events') }}">Évenements</a><li>
            <li><a href="{{ route('shop') }}">Boutique</a><li>
            <li><a href="{{ route('mention') }}">Mentions légales</a><li>
        </ul>
        <!-- Button to close the nav panel -->
        <a class="close" onclick="close_menu()">&#x2716</a>
    </nav>
 </div>