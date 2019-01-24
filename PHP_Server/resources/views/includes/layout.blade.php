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
