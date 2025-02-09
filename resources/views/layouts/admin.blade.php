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
    <div class="min-h-full">
        @include('layouts.admin-navigation')

        <header class="bg-white dark:bg-neutral-800 shadow">
            @isset($header)
                <div {{$header->attributes->class("mx-auto max-w-7xl px-4 py-4 sm:px-4 lg:px-6")}}>
                    {{ $header }}
                </div>
            @endisset
        </header>
        <main class="mx-auto max-w-7xl">
            <div class="max-w-sm my-2 mx-auto">
                @if (session('success'))
                    <div class="bg-teal-50 border-t-2 border-teal-500 rounded-lg p-4 dark:bg-teal-800/30" role="alert" tabindex="-1" aria-labelledby="hs-bordered-success-style-label">
                        <div class="flex">
                            <div class="shrink-0">
                                <!-- Icon -->
                                <span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-400">
                                <x-lucide-check-circle class="size-4"/>
                            </span>
                                <!-- End Icon -->
                            </div>
                            <div class="ms-3">
                                <h3 id="hs-bordered-success-style-label" class="text-gray-800 font-semibold dark:text-white">
                                    Successful
                                </h3>
                                <p class="text-sm text-gray-700 dark:text-white">
                                    {{session('success')}}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="px-1 py-6 sm:px-1 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>
