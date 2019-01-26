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

    <!-- Content of each page -->
    <main>
        <!-- Connexion form -->
        <div class="form">
        <form method="POST" action="{{ route('authenticate') }}" >
            @csrf
            @if(!Auth::check())
            <h3>Se connecter</h3>
                <div class="fieldset">
                    @if ($errors->has('email') || $errors->has('password'))
                        <p class="form_errors" role="alert">Aucun compte n'est associé à cet email ou aucun enreigstrement ne correspond au couple email / mot de passe entré</p>
                    @endif
                    <input id="email" type="email" class="" name="email" placeholder="email" required autofocus>
                </div>
                <div class="fieldset">
                    <input id="password" type="password" class="" name="password" placeholder="mot de passe" required>
                </div>
                <button name="submit" type="submit" id="contact-submit">Connexion</button>
                <a href="register" class="form_link">S'inscrire</a>
            </form>
            @endif
        </div>

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
