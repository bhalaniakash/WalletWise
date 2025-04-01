<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="icon" type="image/png" href="{{ asset('/img/logo-removebg-preview.png') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
              
    .antialiased{
        font-family: 'Figtree', sans-serif;
        background: #E6C7A5;
        margin: 0;
        padding: 0;
    }

    /* Layout */

    main {
        margin-left: 17rem;
        margin-right: 1rem;
        margin-top: 5%;
        padding: 2rem;
        transition: all 0.4s ease-in-out;
        color: #6b4226;
    
        border-radius: 8px;
    
    }
</style>
    </head>
    <body class="font-sans antialiased">
     
    {{--
             @include('layouts.navigation')
             @include('shared.sidenav');
            @include('shared.header');
             @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset --}}

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
    </body>
</html>
