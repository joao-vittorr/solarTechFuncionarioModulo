<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SolarTech</title>
    <link rel="icon" href="{{ asset('images/logoProjetoSolarTechSemTexto.svg') }}" sizes="any" type="image/svg+xml">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwindcss v3.2.4.css') }}">
</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <img src="{{ asset('images/solartech_background.png') }}" class="background_solar" />
        @if (Route::has('auth.google'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-log">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('auth.google') }}" class="btn btn-log" id="login">LOGIN</a>
                @endauth
            </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <img src="{{ asset('images/logoProjetoSolarTechSemTexto.svg') }}" alt="logo_svg"
                    class="h-17 w-auto bg-gray-100 dark:bg-gray-900">
            </div>

            <div class="mt-16">
                <div class="grid grid-cols-1 gap-6 lg:gap-8">
                    <div
                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                        <div>
                            <h1 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Bem-vindo ao SolarTech!
                            </h1>

                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                Este é o portal exclusivo para nossa equipe de funcionários. Damos as boas-vindas à
                                equipe que está liderando a revolução na indústria de painéis solares.
                            </p>
                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                Nossa missão é liderar inovações, priorizar a satisfação e garantir a mais alta
                                qualidade em tudo o que fazemos.
                            </p>
                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                Estamos comprometidos em criar um impacto positivo e construir um futuro mais brilhante
                                por meio da energia solar. Bem-vindo à nossa equipe!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @if (Session::has('error'))
                <br />
                <div class="bg-red text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Erro!</strong>
                    <span class="block sm:inline">{{ Session::get('error') }}</span>
                </div>
            @endif
        </div>

    </div>
</body>

</html>
