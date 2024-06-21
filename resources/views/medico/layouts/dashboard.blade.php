<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthConnect - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


    <!-- Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            overflow: auto; /* Permitir scroll en el body */
        }
    </style>
</head>
<body class="bg-gray-100" x-data="{ sidebarOpen: false }" @click="if (sidebarOpen) sidebarOpen = false">
    <div class="flex h-screen overflow-hidden bg-gray-100" @click.stop>
        <!-- Sidebar -->
        <aside class="bg-white text-gray-800 shadow-lg transition-all duration-300 transform fixed inset-y-0 left-0 z-30 w-64 md:relative md:translate-x-0 flex flex-col"
            :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}">
            <div class="p-6 flex items-center justify-between">
                <a href="{{ url('/medico/dashboard') }}" class="text-2xl font-bold text-purple-600 flex items-center space-x-2">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    <span>HealthConnect Médico</span>
                </a>
            </div>
            <nav class="mt-10 px-4 flex-grow">
                <a href="#" class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-purple-100 hover:text-purple-700">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M5 11h14M12 14v7m5-7H7m10 0a2 2 0 01-2 2h-4a2 2 0 01-2-2"></path>
                    </svg>
                    <span>Mis Citas</span>
                </a>
                <a href="{{ route('medico.agenda') }}" class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-purple-100 hover:text-purple-700">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span>Mi Agenda</span>
                </a>
                <a href="#" class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-purple-100 hover:text-purple-700">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM16 19v-1a4 4 0 00-4-4H8a4 4 0 00-4 4v1"></path>
                    </svg>
                    <span>Pacientes</span>
                </a>
                <a href="#" class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-purple-100 hover:text-purple-700">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A8.962 8.962 0 0112 15c1.603 0 3.1.405 4.394 1.111M21 12a9 9 0 11-18 0 9 9 0 0118 0zM12 3v9m-3 3h6"></path>
                    </svg>
                    <span>Perfil</span>
                </a>
                <a href="#" class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-purple-100 hover:text-purple-700">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h2m4 0h2m4 0h2m4 0h2m-6 4h2m-4-8h2M5 12a7 7 0 0014 0M12 5v2m0 10v2m-6-6H5m14 0h-2"></path>
                    </svg>
                    <span>Configuración</span>
                </a>
            </nav>
            <div class="px-4 py-6">
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="flex items-center justify-center space-x-2 w-full py-2.5 px-4 rounded transition duration-200 bg-gradient-to-r from-purple-500 to-pink-500 text-white hover:from-purple-600 hover:to-pink-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V3"></path>
                        </svg>
                        <span>Cerrar Sesión</span>
                    </button>
                </form>
            </div>
            <div class="w-full p-4 text-sm text-gray-500 mt-auto">
                <p>&copy; 2024 HealthConnect. Todos los derechos reservados.</p>
            </div>
        </aside>

        <!-- Content area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Navbar -->
            <header class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex items-center">
                            <h1 class="text-2xl font-semibold text-purple-700">@yield('title')</h1>
                        </div>
                        <div class="flex items-center">
                            <div class="hidden md:ml-4 md:flex-shrink-0 md:flex md:items-center">
                                <div class="ml-3 relative">
                                    <div class="relative">
                                        <input type="text" placeholder="Buscar..." class="bg-gray-100 rounded-full py-2 px-4 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                        <svg class="w-5 h-5 text-gray-500 absolute right-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('logout') }}" class="inline" id="logout-form">
                                    @csrf
                                    <button type="button" class="ml-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white py-2 px-4 rounded-full hover:from-purple-600 hover:to-pink-600 transition duration-300 shadow-md" onclick="handleLogout()">
                                        Cerrar Sesión
                                    </button>
                                </form>
                            </div>
                            <div class="flex md:hidden">
                                <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500">
                                    <span class="sr-only">Open menu</span>
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main content -->
            <main class="flex-1 overflow-auto p-6" @click="if (sidebarOpen) sidebarOpen = false">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
