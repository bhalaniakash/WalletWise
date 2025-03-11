<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        @include('partials.navbar')  <!-- Navbar File -->
    </header>

    <main>
        @yield('content')  <!-- Dynamic Content -->
    </main>

    <footer>
        @include('partials.footer')  <!-- Footer File -->
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
