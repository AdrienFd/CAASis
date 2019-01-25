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
    <main>
    <div class="content" onclick="close_menu()">

            <!-- Connexion form -->
            <div class="form">
                <form id="form_connexion" action="{{ route('login') }}" method="post">
                    @csrf
                    <h3>Se connecter</h3>
                    <div class="fieldset">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                required autofocus />
                    </div>

                    <div class="fieldset">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                name="password" required> </div>

                    <button name="submit" type="submit" id="contact-submit">Connexion</button>
                    <a class="form_link">S'inscrire</a>
                </form>
            </div>

        @yield('main')
        </div>
    </main>


    <!-- Footer -->
    <footer onclick="close_menu()">
        @include('includes.footer')
    </footer>

    <!-- Scripts -->
    <script type="text/javascript" src="{{asset('js/navbar.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/form_connection.js')}}"></script>
    @yield('scripts')
</body>

</html>
