<!doctype html>
<html lang='fr'>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Projet" content="CAASis">
    <meta name="description" content="CAASis est un projet de quatre étudiants en Ecole d'Ingénieurs.
    Il consiste en la mise en place d'un site web contenant diverses informations à propos de la vie des étudiants,
    ainsi qu'une boutique destinée non seulement à ces derniers, mais également aux salariés CESI.">
    <meta name="keywords" content="projet, caasis, bde, evenement, cesi, ecole, ingenieur, etudiant,boutique, goodies, arras, rouen, reims, lille">

    <title>CAASis's Project</title>

    <!-- Links -->
    @yield('stylesheets')
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300" rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <header>
        @yield('header')
    </header>

    <!-- Main -->
    <main>
        <!-- Connexion form display is user is guest (not login)-->
        @if(!Auth::check())
        <div class="form" id="form_login">
            <form method="POST" action="{{ route('authenticate') }}">
                @csrf
                <h3>Se connecter</h3>

                <!-- Email field -->
                <div class="fieldset">
                    @if ($errors->has('email') || $errors->has('password'))
                    <p class="form_errors" role="alert">Aucun compte n'est associé à cet email ou aucun enreigstrement
                        ne correspond au couple email / mot de passe entré</p>
                    @endif
                    <input type="email" class="" name="email" placeholder="email" required autofocus>
                </div>

                <!-- PSW field -->
                <div class="fieldset">
                    <input type="password" class="" name="password" placeholder="mot de passe" required>
                </div>

                <!-- Button & link aera -->
                <button name="submit" type="submit">Connexion</button>
                <a href="{{ route('register') }}" class="form_link">S'inscrire</a>
                <a href="{{ route('resetPSW') }}" class="form_link">Mot de passe oublié ?</a>
            </form>
        </div>
        @endif

        <!-- Main content of each page -->
        <div class="content" <?php if(!Auth::check()) {echo 'onclick="close_menu(); close_login()"';} else {echo 'onclick="close_menu()"';}?>>
            @yield('main')
        </div>
    </main>

    <!-- Footer -->
    <footer onclick="close_menu()">
        @include('includes.footer')
    </footer>

    <!-- Scripts -->
    <script src="{{asset('js/navbar.js')}}"></script>
    @if(!Auth::check())
    <script src="{{asset('js/form_connection.js')}}"></script>
    @endif
    @yield('scripts')
</body>

</html>
