<!doctype html>
<html>

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
    <main class="content">

        <!-- Formulaire de connexion -->
        <div class="form">
            <form id="form" method="POST" action="{{ route('login') }}">
            @csrf
                <h3>Se connecter</h3>
                <div class="fieldset">
                    <input id="email" placeholder="Adresse e-mail" type="email" name="email" value="{{ old('email') }}"
                        required autofocus />
                </div>

                <div class="fieldset">
                    <input id="password" placeholder="Mot de passe" type="password" name="password" required autofocus />
                </div>

                    <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Connexion</button>

                <a class="form_link">S'inscrire</a>
            </form>
        </div>

        <!-- Formulaire d'inscription -->
        <div class="form">
            <form id="form" method="POST" action="{{ route('register') }}">
            @csrf
                <h3>S'inscrire</h3>
                <div class="fieldset">
                <input id="email" type="email" placeholder="Adresse e-mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="fieldset">
                <input id="password" type="password" placeholder="Mot de passe" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                </div>

                <div class="fieldset">
                <input id="password-confirm" type="password" placeholder="Confirmation du mot de passe" class="form-control" name="password_confirmation" required>
                </div>

                    <button name="submit" type="submit" id="form-submit" data-submit="...Sending">Inscription</button>

                <a class="form_link">Se connecter</a>
            </form>
        </div>

        @yield('main')
    </main>

    <!-- Footer -->
    <footer>
        @include('includes.footer')
    </footer>

    <!-- Scripts -->
    <script type="text/javascript" src="{{asset('js/navbar.js')}}"></script>
    @yield('scripts')
</body>

</html>
