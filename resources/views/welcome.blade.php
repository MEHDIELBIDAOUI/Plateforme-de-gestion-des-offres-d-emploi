<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans text-gray-900 bg-white dark:bg-gray-900 dark:text-gray-100">
    <div
        class="relative min-h-screen overflow-hidden bg-gradient-to-br from-indigo-50 via-white to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-indigo-900">

        <!-- Navigation -->
        <nav class="relative z-20 flex items-center justify-between px-6 py-4 max-w-7xl mx-auto">
            <div
                class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600 dark:from-indigo-400 dark:to-purple-400">
                JobPlatform
            </div>
            <div class="space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="text-sm font-semibold text-gray-600 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-white transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm font-semibold text-gray-600 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-white transition">Log
                            in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition shadow-lg shadow-indigo-500/30">Get
                                Started</a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>

        <!-- Hero Section -->
        <main class="flex flex-col items-center justify-center min-h-[85vh] text-center px-4 relative z-10">
            <div
                class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[500px] bg-indigo-200/30 rounded-full blur-3xl -z-10 dark:bg-indigo-900/20">
            </div>

            <span
                class="inline-block px-4 py-1.5 mb-6 text-sm font-medium text-indigo-700 bg-indigo-100 rounded-full dark:bg-indigo-900/50 dark:text-indigo-300">
                🚀 #1 Platform for Top Talent
            </span>

            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight mb-6">
                Find Your <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 dark:from-indigo-400 dark:to-purple-400">Dream
                    Job</span> <br class="hidden md:block" /> Today
            </h1>

            <p class="max-w-2xl text-lg md:text-xl text-gray-600 dark:text-gray-300 mb-10 leading-relaxed">
                Connect with thousands of top-tier companies. Manage applications, post jobs, and accelerate your career
                growth with our modern platform.
            </p>

            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('register') }}"
                    class="px-8 py-3.5 text-lg font-semibold text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 transition-all shadow-xl shadow-indigo-500/30 hover:-translate-y-1">
                    Find a Job
                </a>
                <a href="{{ route('register') }}"
                    class="px-8 py-3.5 text-lg font-semibold text-gray-900 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition-all shadow-sm hover:shadow-md dark:bg-gray-800 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700">
                    Post a Job
                </a>
            </div>

            <!-- Stats/Trust -->
            <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-8 opacity-80 text-center w-full max-w-4xl">
                <div>
                    <div class="text-3xl font-bold text-gray-900 dark:text-white">10k+</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Active Jobs</div>
                </div>
                <div>
                    <div class="text-3xl font-bold text-gray-900 dark:text-white">500+</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Companies</div>
                </div>
                <div>
                    <div class="text-3xl font-bold text-gray-900 dark:text-white">5k+</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Candidates</div>
                </div>
                <div>
                    <div class="text-3xl font-bold text-gray-900 dark:text-white">24/7</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Support</div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>