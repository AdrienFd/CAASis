<!-- Nav button -->
<button class="menu_button" onclick="open_menu()">&#x2630</button>


<!-- Nav panel -->
<div id="navPanel" class="navPanel">
    <nav>
        <!-- Connect and register links -->
        <ul class="authentification">
            <!-- if user is connected display disconnect and change psw -->
            @if(Auth::check())
            <li>
                <a href="{{ route('logout') }}">Déconnexion</a>
                <a href="{{ route('changePSW') }}">Changer mot de passe</a>
            </li>
            <!-- if user is not connected display connect and subscribe -->
            @else
            <li class="connect">
                <a href="#connect" onclick="open_popup('form_login')">Connexion</a>
            </li>
            <li class="register">
                <a href="{{ route('register') }}">Inscription</a>
            </li>
            @endif
        </ul>
        <!-- Links to others pages -->
        <ul class="links">
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="{{ route('ideas') }}">Boîte à idées</a></li>
            <li><a href="{{ route('events') }}">Évenements</a></li>
            <li><a href="{{ route('shop') }}">Boutique</a></li>
            <li><a href="{{ route('mention') }}">Mentions légales</a></li>
            @if(session('statut') == "Student Desk Member")
            <li><a href="{{ route('promote') }}">Gestion membres BDE</a></li>
            @endif
            @if(session('statut') == "Employee")
            <li><a href="{{ route('toApprobateImg') }}">Images à approuver</a></li>
            @endif
        </ul>
        <!-- Button to close the nav panel -->
        <a class="close" onclick="close_menu()">&#x2716</a>
    </nav>
</div>
