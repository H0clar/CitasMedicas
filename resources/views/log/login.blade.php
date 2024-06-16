<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthConnect - Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-400 to-indigo-600 min-h-screen flex flex-col">
    <!-- Navbar -->
    <header x-data="{ isOpen: false }" class="fixed top-0 left-0 w-full z-50 bg-white shadow-md">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-purple-600">HealthConnect</a>

            <nav class="hidden md:flex space-x-6">
                <a href="{{ url('/') }}" class="text-gray-600 hover:text-purple-600 transition duration-300">Inicio</a>
                <a href="{{ url('/#services') }}" class="text-gray-600 hover:text-purple-600 transition duration-300">Servicios</a>
                <a href="{{ url('/#contact') }}" class="text-gray-600 hover:text-purple-600 transition duration-300">Contacto</a>
                <a href="{{ route('login') }}" class="bg-purple-500 text-white py-2 px-4 rounded hover:bg-purple-600 transition duration-300">Iniciar Sesión</a>
            </nav>
            <button @click="isOpen = !isOpen" class="md:hidden focus:outline-none">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        <div x-show="isOpen" @click.away="isOpen = false" class="md:hidden bg-white shadow-lg">
            <nav class="px-4 pt-2 pb-4 space-y-1 text-center">
                <a href="{{ url('/') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-purple-600 hover:bg-purple-100 transition duration-300">Inicio</a>
                <a href="{{ url('/#services') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-purple-600 hover:bg-purple-100 transition duration-300">Servicios</a>
                <a href="{{ url('/#contact') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-purple-600 hover:bg-purple-100 transition duration-300">Contacto</a>
                <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium bg-purple-500 text-white hover:bg-purple-600 transition duration-300">Iniciar Sesión</a>
            </nav>
        </div>
    </header>

    <!-- Login Section -->
    <div class="flex-grow flex items-center justify-center p-4">
        <div class="bg-white w-full max-w-4xl rounded-2xl shadow-2xl overflow-hidden flex flex-col md:flex-row">
            <!-- Imagen lateral -->
            <div class="md:w-1/2 bg-cover bg-center hidden md:block" style="background-image: url('https://source.unsplash.com/random/800x600?medical');">
                <div class="h-full bg-black bg-opacity-25 flex items-center">
                    <div class="px-10 max-w-xl">
                        <h2 class="text-4xl font-bold text-white mb-4">Bienvenido a HealthConnect</h2>
                        <p class="text-white">Conectando la salud con la tecnología para un futuro más saludable.</p>
                    </div>
                </div>
            </div>

            <!-- Formularios -->
            <div class="w-full md:w-1/2 py-16 px-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Accede a tu cuenta</h2>
                <p class="text-gray-600 mb-8">Ingresa tus credenciales para comenzar</p>

                <!-- Pestañas -->
                <div class="flex mb-8">
                    <button id="loginTab" class="flex-1 text-center py-2 px-4 border-b-2 font-medium text-sm focus:outline-none">
                        Iniciar sesión
                    </button>
                    <button id="registerTab" class="flex-1 text-center py-2 px-4 border-b font-medium text-sm text-gray-500 focus:outline-none">
                        Registrarse
                    </button>
                </div>

                <!-- Formulario de login -->
                <form id="loginForm" action="{{ route('login') }}" method="post" class="space-y-6">
                    @csrf
                    <div>
                        <label for="loginEmail" class="text-sm font-medium text-gray-700 block mb-2">Correo electrónico</label>
                        <input type="email" id="loginEmail" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                    </div>
                    <div>
                        <label for="loginPassword" class="text-sm font-medium text-gray-700 block mb-2">Contraseña</label>
                        <input type="password" id="loginPassword" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                    </div>
                    <div>
                        <button type="submit" class="w-full bg-purple-600 text-white py-2 px-4 rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition duration-300">Iniciar sesión</button>
                    </div>
                </form>

                <!-- Formulario de registro (inicialmente oculto) -->
                <form id="registerForm" action="{{ route('register') }}" method="post" class="space-y-6 hidden">
                    @csrf
                    <div>
                        <label for="registerName" class="text-sm font-medium text-gray-700 block mb-2">Nombre completo</label>
                        <input type="text" id="registerName" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                    </div>
                    <div>
                        <label for="registerEmail" class="text-sm font-medium text-gray-700 block mb-2">Correo electrónico</label>
                        <input type="email" id="registerEmail" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                    </div>
                    <div>
                        <label for="registerPassword" class="text-sm font-medium text-gray-700 block mb-2">Contraseña</label>
                        <input type="password" id="registerPassword" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                    </div>
                    <div>
                        <button type="submit" class="w-full bg-purple-600 text-white py-2 px-4 rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition duration-300">Registrarse</button>
                    </div>
                </form>

                <p class="text-center text-sm text-gray-500 mt-4">&copy; 2024 HealthConnect. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>

    <script>
        const loginTab = document.getElementById('loginTab');
        const registerTab = document.getElementById('registerTab');
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');

        loginTab.addEventListener('click', () => {
            loginTab.classList.remove('text-gray-500', 'border-b');
            loginTab.classList.add('border-b-2', 'border-purple-500', 'text-purple-600');
            registerTab.classList.add('text-gray-500', 'border-b');
            registerTab.classList.remove('border-b-2', 'border-purple-500', 'text-purple-600');
            loginForm.classList.remove('hidden');
            registerForm.classList.add('hidden');
        });

        registerTab.addEventListener('click', () => {
            registerTab.classList.remove('text-gray-500', 'border-b');
            registerTab.classList.add('border-b-2', 'border-purple-500', 'text-purple-600');
            loginTab.classList.add('text-gray-500', 'border-b');
            loginTab.classList.remove('border-b-2', 'border-purple-500', 'text-purple-600');
            registerForm.classList.remove('hidden');
            loginForm.classList.add('hidden');
        });
    </script>
</body>
</html>
