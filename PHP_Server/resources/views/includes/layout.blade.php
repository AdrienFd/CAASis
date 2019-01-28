<!doctype html>
<html lang='fr'>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CAASis's Project</title>

    <!-- Links -->
    @yield('stylesheets')
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
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
        <div class="content" onclick="close_menu(); close_login()">
            @yield('main')
        </div>
    </main>

    <!-- Footer -->
    <footer onclick="close_menu()">
        @include('includes.footer')
    </footer>

    <!-- Scripts -->
    <script src="{{asset('js/navbar.js')}}"></script>
    <script src="{{asset('js/form_connection.js')}}"></script>
    @yield('scripts')
</body>

</html>
