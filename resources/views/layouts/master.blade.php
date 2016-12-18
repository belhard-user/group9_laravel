<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Главная')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <nav>
        <ul>
            <li>Link 1</li>
            <li>Link 2</li>
            <li>Link 3</li>
            @yield('menu')
        </ul>
    </nav>

    <h1>@yield('page-title')</h1>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        @yield('footer')
        Copyright 2001 - {{ date('Y') }}
    </footer>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>