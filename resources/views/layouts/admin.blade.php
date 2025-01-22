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

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen grid grid-cols-10 bg-gray-100 dark:bg-gray-900">
        <div class="flex dark:text-white flex-col items-center col-span-2 py-10">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>

            <ul class="w-full space-y-3 d px-3 pt-10">
                <li @class([ "px-5 py-3 rounded-full" , "bg-gray-700 text-white"=> request()->routeIs('admin'),
                    "hover:bg-gray-800/80 hover:text-white" => !request()->routeIs('admin')
                    ])> <a class="flex items-center justify-between" href="#">Users <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </a></li>

                <li @class([ "px-5 py-3 rounded-full" , "bg-gray-700 text-white"=> request()->routeIs('orders'),
                    "hover:bg-gray-800/80 hover:text-white" => !request()->routeIs('orders')
                    ])><a class="flex items-center justify-between" href="#">Orders <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </a></li>
                <li @class([ "px-5 py-3 rounded-full" , "bg-gray-700 text-white"=> request()->routeIs('products.index'),
                    "hover:bg-gray-800/80 hover:text-white" => !request()->routeIs('products.index')
                    ])><a class="flex items-center justify-between" href="{{route('products.index')}}">Products <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>
                    </a></li>
            </ul>
        </div>

        <div class="w-full col-span-8 col-start-3 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>