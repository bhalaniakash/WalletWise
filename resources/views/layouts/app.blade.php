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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
              
    body {
        font-family: 'Figtree', sans-serif;
        background-color: #f9fafb;
        color: #333;
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
    background-color: #fff;
    color: #333;
    /* color: #000; */
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}





            </style>
    </head>
    <body class="font-sans antialiased">
     
            @include('layouts.navigation')
            {{-- @include('shared.sidenav');
            @include('shared.header'); --}}
            <!-- Page Heading -->
            {{-- @isset($header)
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
