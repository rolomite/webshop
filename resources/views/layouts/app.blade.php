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
</head>

<body class="font-sans text-neutral-900 dark:bg-neutral-900 dark:text-neutral-200 antialiased h-full">
    <div class="min-h-full" x-data="cart()">
        @include('layouts.navigation')

        <header class="bg-white dark:bg-neutral-800 shadow">
            @isset($header)
            <div {{$header->attributes->class("mx-auto max-w-7xl px-4 py-4 sm:px-4 lg:px-6")}}>
                {{ $header }}
            </div>
            @endisset
        </header>
        <main>
            <div class="mx-auto max-w-7xl px-5 py-6 sm:px-1 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>