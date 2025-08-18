<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Table de Marque - Basket</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center justify-center min-h-screen flex-col">

    <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6">
        @if (Route::has('login'))
            <nav class="flex items-center justify-end gap-4">
                @auth
           
                @else
                    <a href="{{ route('login') }}" class="px-5 py-1.5 border rounded-sm text-sm dark:text-[#EDEDEC] text-[#1b1b18] hover:border-[#1915014a]">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-5 py-1.5 border rounded-sm text-sm dark:text-[#EDEDEC] text-[#1b1b18] hover:border-[#1915014a]">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <main class="text-center space-y-6">
       <h1 class="text-3xl font-semibold animate-pulse text-white">🏀 Bienvenue à la Table de Marque</h1>
        <p class="text-lg text-gray-600 dark:text-gray-300">Gérez vos matchs en temps réel.</p>
        @auth
        <div class="flex flex-col lg:flex-row gap-4 justify-center mt-6">
            <a href="{{ url('/dashboard') }}" class="px-6 py-3 bg-gray-800 text-white rounded hover:bg-gray-900">
                Accéder au dashboard
            </a>
        </div>
        @endauth
    </main>

</body>
</html>