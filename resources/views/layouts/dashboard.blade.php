<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthConnect - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0; /* Asegúrate de que no haya márgenes en el body */
            overflow: hidden; /* Evita el scroll */
        }
    </style>
</head>
<body class="bg-gray-100" x-data="{ sidebarOpen: false }" @click="if (sidebarOpen) sidebarOpen = false">
    <div class="flex h-screen bg-gray-100" @click.stop>
        <!-- Sidebar -->
        <!-- Sidebar -->
        <aside class="bg-white text-gray-800 shadow-lg transition-all duration-300 transform 
                    fixed inset-y-0 left-0 z-30 w-64 md:relative md:translate-x-0"
            :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}">
            <div class="p-6 flex items-center justify-between">
                <a href="{{ url('/home') }}" class="text-2xl font-bold text-purple-600 flex items-center space-x-2">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    <span>HealthConnect</span>
                </a>
            </div>
            <nav class="mt-10 px-4">
                <a href="{{ route('citas') }}" class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-purple-100 hover:text-purple-700">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M5 11h14M12 14v7m5-7H7m10 0a2 2 0 01-2 2h-4a2 2 0 01-2-2"></path></svg>
                    <span>Mis Citas</span>
                </a>
                <a href="{{ url('/schedule-appointment') }}" class="flex items-center space-x-2 py-2.5 px-4 rounded transition duration-200 hover:bg-purple-100 hover:text-purple-700">
                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    <span>Agendar Cita</span>
                </a>
            </nav>
            <div class="absolute bottom-0 w-full p-4 text-sm text-gray-500">
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
                                        <svg class="w-5 h-5 text-gray-500 absolute right-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
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
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main content -->
            <main class="flex-1 overflow-hidden p-6" @click="if (sidebarOpen) sidebarOpen = false">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        function handleLogout() {
            // Borrar todas las cookies
            document.cookie.split(";").forEach(function(c) {
                document.cookie = c.trim().split("=")[0] + "=;expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            });

            // Enviar el formulario de logout
            document.getElementById('logout-form').submit();
        }
    </script>
</body>
</html>
