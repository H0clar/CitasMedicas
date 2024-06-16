<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthConnect - Citas Médicas</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-purple-50 text-gray-800">
    <!-- Navbar -->
    <header x-data="{ isOpen: false }" class="fixed top-0 left-0 w-full z-50 bg-white shadow-md">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <a href="#" class="text-2xl font-bold text-purple-600">HealthConnect</a>

            <nav class="hidden md:flex space-x-6 items-center">
                <a href="#home" class="text-gray-600 hover:text-purple-600 transition duration-300">Inicio</a>
                <a href="#services" class="text-gray-600 hover:text-purple-600 transition duration-300">Servicios</a>
                <a href="#contact" class="text-gray-600 hover:text-purple-600 transition duration-300">Contacto</a>
                <a href="/login" class="bg-purple-500 text-white py-2 px-4 rounded hover:bg-purple-600 transition duration-300">Iniciar Sesión</a>
            </nav>
            <button @click="isOpen = !isOpen" class="md:hidden focus:outline-none">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        <div x-show="isOpen" @click.away="isOpen = false" class="md:hidden bg-white shadow-lg">
            <nav class="px-4 pt-2 pb-4 space-y-1 text-center">
                <a href="#home" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-purple-600 hover:bg-purple-100 transition duration-300">Inicio</a>
                <a href="#services" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-purple-600 hover:bg-purple-100 transition duration-300">Servicios</a>
                <a href="#contact" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-purple-600 hover:bg-purple-100 transition duration-300">Contacto</a>
                <a href="/login" class="block px-3 py-2 rounded-md text-base font-medium bg-purple-500 text-white hover:bg-purple-600 transition duration-300">Iniciar Sesión</a>
            </nav>
        </div>
    </header>

    <!-- Home Section -->
    <section id="home" class="flex items-center justify-center min-h-screen pt-20 bg-gradient-to-br from-purple-100 via-pink-100 to-yellow-100">
        <div class="container mx-auto flex flex-col md:flex-row items-center px-6">
            <div class="md:w-1/2 text-center md:text-left">
                <h1 class="text-4xl md:text-6xl font-bold mb-4 text-purple-700 leading-tight">Revoluciona tu Salud</h1>
                <p class="text-xl md:text-2xl font-light mb-8 text-pink-600">Citas médicas a un clic de distancia</p>
                <p class="text-lg md:text-xl mb-8 text-gray-700 leading-relaxed">
                    Experimenta la forma más rápida y conveniente de agendar tus citas médicas. Conectamos pacientes con los mejores profesionales de la salud.
                </p>
                <a href="/login" class="bg-gradient-to-r from-purple-500 to-pink-500 text-white py-3 px-8 rounded-full hover:from-purple-600 hover:to-pink-600 transition duration-300 inline-block shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-lg font-semibold">¡Únete Ahora!</a>
            </div>
            <div class="md:w-1/2 mt-10 md:mt-0">
                <img src="https://placehold.co/600x400" alt="Ilustración de servicios médicos" class="rounded-lg shadow-2xl">
            </div>
        </div>
    </section>

    <!-- Servicios Section -->
    <section id="services" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-purple-700 mb-8">Nuestros Servicios</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-purple-100 rounded-lg p-6 shadow-md hover:shadow-lg transition duration-300">
                    <svg class="w-12 h-12 text-purple-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold mb-2 text-purple-700">Citas en Línea</h3>
                    <p class="text-gray-600">Agenda tus citas médicas de forma rápida y sencilla desde cualquier dispositivo.</p>
                </div>
                <div class="bg-purple-100 rounded-lg p-6 shadow-md hover:shadow-lg transition duration-300">
                    <svg class="w-12 h-12 text-purple-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                    <h3 class="text-xl font-semibold mb-2 text-purple-700">Historial Médico Digital</h3>
                    <p class="text-gray-600">Accede a tu historial médico completo en cualquier momento y lugar de forma segura.</p>
                </div>
                <div class="bg-purple-100 rounded-lg p-6 shadow-md hover:shadow-lg transition duration-300">
                    <svg class="w-12 h-12 text-purple-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold mb-2 text-purple-700">Consultas Virtuales</h3>
                    <p class="text-gray-600">Realiza consultas médicas desde la comodidad de tu hogar a través de videollamadas.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gradient-to-b from-purple-100 to-white">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center text-purple-700 mb-12">Contáctanos</h2>
            <div class="flex flex-wrap -mx-4">
                <!-- Formulario de contacto -->
                <div class="w-full lg:w-1/2 px-4 mb-8 lg:mb-0">
                    <form class="bg-white shadow-lg rounded-lg p-8">
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                Nombre
                            </label>
                            <input class="w-full bg-gray-100 border border-gray-300 rounded-lg py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 transition duration-300" id="name" type="text" placeholder="Tu nombre completo">
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                Correo Electrónico
                            </label>
                            <input class="w-full bg-gray-100 border border-gray-300 rounded-lg py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 transition duration-300" id="email" type="email" placeholder="tu@email.com">
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                                Mensaje
                            </label>
                            <textarea class="w-full bg-gray-100 border border-gray-300 rounded-lg py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 transition duration-300" id="message" rows="5" placeholder="¿En qué podemos ayudarte?"></textarea>
                        </div>
                        <div class="flex items-center justify-center">
                            <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-6 rounded-full focus:outline-none focus:shadow-outline transition duration-300 transform hover:scale-105" type="button">
                                Enviar Mensaje
                            </button>
                        </div>
                    </form>
                </div>
                <!-- Información de contacto -->
                <div class="w-full lg:w-1/2 px-4">
                    <div class="bg-purple-600 text-white rounded-lg shadow-lg p-8 h-full">
                        <h3 class="text-2xl font-semibold mb-6">Información de Contacto</h3>
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold mb-2">Dirección</h4>
                            <p>123 Calle Salud, Ciudad Médica, CP 12345</p>
                        </div>
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold mb-2">Teléfono</h4>
                            <p>+1 (123) 456-7890</p>
                        </div>
                        <div class="mb-6">
                            <h4 class="text-lg font-semibold mb-2">Email</h4>
                            <p>contacto@healthconnect.com</p>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-2">Horario de Atención</h4>
                            <p>Lunes a Viernes: 9:00 AM - 6:00 PM</p>
                            <p>Sábados: 9:00 AM - 2:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-purple-800 text-white">
        <div class="container mx-auto px-6 py-10">
            <div class="flex flex-wrap">
                <!-- Logo y descripción -->
                <div class="w-full md:w-1/4 text-center md:text-left">
                    <h1 class="text-2xl font-bold mb-2">HealthConnect</h1>
                    <p class="text-gray-300 mb-4">Conectando pacientes y profesionales de la salud de manera eficiente.</p>
                </div>

                <!-- Enlaces rápidos -->
                <div class="w-full md:w-1/4 mt-8 md:mt-0">
                    <h3 class="text-lg font-semibold mb-2">Enlaces Rápidos</h3>
                    <ul class="text-gray-300">
                        <li class="mb-2"><a href="#home" class="hover:text-white transition duration-300">Inicio</a></li>
                        <li class="mb-2"><a href="#services" class="hover:text-white transition duration-300">Servicios</a></li>
                        <li class="mb-2"><a href="#contact" class="hover:text-white transition duration-300">Contacto</a></li>
                    </ul>
                </div>

                <!-- Servicios -->
                <div class="w-full md:w-1/4 mt-8 md:mt-0">
                    <h3 class="text-lg font-semibold mb-2">Nuestros Servicios</h3>
                    <ul class="text-gray-300">
                        <li class="mb-2">Citas en Línea</li>
                        <li class="mb-2">Historial Médico Digital</li>
                        <li class="mb-2">Consultas Virtuales</li>
                    </ul>
                </div>

                <!-- Contacto -->
                <div class="w-full md:w-1/4 mt-8 md:mt-0">
                    <h3 class="text-lg font-semibold mb-2">Contacto</h3>
                    <p class="text-gray-300 mb-2">123 Calle Salud, Ciudad Médica</p>
                    <p class="text-gray-300 mb-2">Teléfono: (123) 456-7890</p>
                    <p class="text-gray-300">Email: info@healthconnect.com</p>
                </div>
            </div>

            <!-- Redes sociales -->
            <div class="mt-8 text-center">
                <h3 class="text-lg font-semibold mb-4">Síguenos en Redes Sociales</h3>
                <div class="flex justify-center space-x-4">
                    <a href="#" class="text-gray-300 hover:text-white transition duration-300">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white transition duration-300">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white transition duration-300">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="bg-purple-900 py-4">
            <div class="container mx-auto px-6 text-center">
                <p class="text-sm text-gray-300">
                    © 2024 HealthConnect. Todos los derechos reservados.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
