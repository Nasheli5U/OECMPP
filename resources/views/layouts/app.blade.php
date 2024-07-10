<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased bg-gray-100">
    <!-- Encabezado -->
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

    <!-- Contenido de la aplicación -->
    <div class="flex">
        <aside id="default-sidebar" class="fixed top-16 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-gray-50 dark:bg-gray-800">
            <div class="h-full px-3 py-4 overflow-y-auto">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="{{ route('expedientes.create') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 2a8 8 0 11-8 8 8 8 0 018-8m0-2a10 10 0 1010 10A10 10 0 0010 0z"/>
                                <path d="M9 13h2v2H9zm1-2a3 3 0 113-3 3 3 0 01-3 3z"/>
                            </svg>
                            <span class="ml-3">Agregar Expediente</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('expedientes.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zm1 15h-2v-2h2v2zm0-4h-2V5h2v6z"/>
                            </svg>
                            <span class="ml-3">Listado</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 4a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V4zm10 2H8v4h4V6z"/>
                            </svg>
                            <span class="ml-3">Resoluciones</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('expedientes.reportes') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M17 2H3c-.55 0-1 .45-1 1v14c0 .55.45 1 1 1h14c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm-8 12H5v-2h4v2zm6-4H5V8h10v2z"/>
                            </svg>
                            <span class="ml-3">Reportes</span>
                        </a>
                    </li>

                    <li>
                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zM9 9H5a1 1 0 000 2h4a1 1 0 000-2zm6.293-4.293a1 1 0 10-1.414-1.414L14 6.586V5a1 1 0 00-2 0v1.586l-1.293-1.293a1 1 0 10-1.414 1.414L11.586 9l-2.293 2.293a1 1 0 001.414 1.414L14 10.414V12a1 1 0 102 0v-1.586l1.293 1.293a1 1 0 001.414-1.414L16.414 9l2.293-2.293z" clip-rule="evenodd"/>
                                </svg>
                                <span class="ml-3">Salir</span>
                            </a>
                        </form>
                    </li>
                
                </ul>
            </div>
        </aside>

        <main class="ml-64 p-4 w-full">
            @yield('content')
        </main>
    </div>

    <!-- Pie de página u otros elementos comunes -->
</body>
</html>
