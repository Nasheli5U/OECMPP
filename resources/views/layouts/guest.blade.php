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
    <header class="bg-gray-800 text-white py-4">
            <div class="container mx-auto flex justify-between items-center">
                <div>
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Escudo_de_Puno.png" alt="Logo" class="h-10">
                </div>
                <div>
                    <h1 class="text-lg font-bold">OFICINA DE EJECUCIÓN COACTIVA</h1>
                </div>
                <div>
                <img src="https://portal.munipuno.gob.pe/sites/default/files/LOGO%20MPP%202022_2.png" alt="Puno Renace" class="h-10">
                </div>
            </div>
        </header>

    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            

                {{ $slot }}
            </div>
        </div>
    </body>
</html>
