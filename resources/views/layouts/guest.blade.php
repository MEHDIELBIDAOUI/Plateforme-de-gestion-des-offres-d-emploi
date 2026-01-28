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
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-indigo-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-indigo-900 relative overflow-hidden">
        <!-- Decorative Background Elements -->
        <div
            class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[500px] bg-indigo-200/20 rounded-full blur-3xl -z-10 dark:bg-indigo-900/20">
        </div>

        <div class="mb-8">
            <a href="/" class="flex flex-col items-center">
                <x-application-logo class="w-16 h-16 fill-current text-indigo-600 dark:text-indigo-400 mb-2" />
                <span class="text-2xl font-bold text-gray-900 dark:text-white tracking-tight">JobPlatform</span>
            </a>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white/70 dark:bg-gray-800/80 backdrop-blur-xl shadow-xl border border-white/50 dark:border-gray-700 overflow-hidden sm:rounded-2xl transition-all duration-300 hover:shadow-2xl hover:shadow-indigo-500/10">
            {{ $slot }}
        </div>

        <div class="mt-8 text-center text-sm text-gray-400 dark:text-gray-500">
            &copy; {{ date('Y') }} JobPlatform. All rights reserved.
        </div>
    </div>
</body>

</html>