@extends('medico.layouts.dashboard')

@section('title', 'Agenda Médica')

@section('content')
<section id="agenda" class="bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 py-12 min-h-screen" x-data="{ view: 'day', searchTerm: '', showModal: false, modalData: {}, showConfirmationModal: false }">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">Agenda Médica</h1>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <input type="text" x-model="searchTerm" placeholder="Buscar paciente..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <div class="flex space-x-2">
                    <button @click="view = 'day'" :class="{'bg-purple-500 text-white': view === 'day', 'bg-purple-200 text-gray-700': view !== 'day'}" class="px-4 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500 transition-colors duration-200">Día</button>
                    <button @click="view = 'week'" :class="{'bg-purple-500 text-white': view === 'week', 'bg-purple-200 text-gray-700': view !== 'week'}" class="px-4 py-2 rounded-full focus:outline-none focus:ring-2 focus:ring-purple-500 transition-colors duration-200">Semana</button>
                </div>
                <button class="bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">Nueva Cita</button>
            </div>
        </div>

        <!-- Resumen visual de citas -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4">Resumen del día</h2>
            <div class="flex items-center space-x-4">
                <div class="w-1/2 bg-gray-200 rounded-full h-4">
                    <div class="bg-green-500 h-4 rounded-full" style="width: 37.5%;"></div>
                </div>
                <span class="text-sm font-medium">3/8 citas completadas</span>
            </div>
            <div class="mt-4 flex space-x-4">
                <button class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">Todas (8)</button>
                <button class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-medium">Pendientes (5)</button>
                <button class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">Completadas (3)</button>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-6">
                <!-- Sidebar con resumen de citas -->
                <div class="bg-purple-100 p-4 border-r border-purple-200">
                    <h2 class="text-lg font-semibold mb-4">Próximas citas</h2>
                    <div class="space-y-2">
                        <!-- Lista de próximas citas aquí -->
                        <div class="bg-white p-2 rounded shadow-sm">
                            <p class="font-medium">10:30 - María González</p>
                            <p class="text-sm text-gray-600">Consulta general</p>
                        </div>
                        <div class="bg-white p-2 rounded shadow-sm">
                            <p class="font-medium">11:45 - Carlos Rodríguez</p>
                            <p class="text-sm text-gray-600">Seguimiento</p>
                        </div>
                        <!-- Más citas... -->
                    </div>
                </div>
                
                <!-- Timeline de citas -->
                <div class="col-span-3 lg:col-span-5 p-4">
                    <div x-show="view === 'day'" class="space-y-6">
                        <!-- Grupo de hora -->
                        <div class="relative">
                            <div class="absolute top-0 left-0 w-px h-full bg-gray-200"></div>
                            <div class="relative pl-8">
                                <span class="absolute left-0 top-2 w-4 h-4 rounded-full bg-blue-500"></span>
                                <h3 class="text-lg font-semibold mb-4">9:00 AM</h3>
                                <!-- Cita individual -->
                                <div class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200 cursor-pointer mb-4 border-l-4 border-blue-500"
                                     @click="modalData = { patient: 'Juan Pérez', description: 'Control mensual', dateTime: 'Jueves, 06 de mayo - 9:00 a 10:00 hrs', doctor: 'Dr. Matías García', phone: '+569 8765 4321', email: 'juanperez@gmail.com', comment: 'Paciente con hipertensión' }; showModal = true">
                                    <div class="flex justify-between items-center mb-2">
                                        <h4 class="text-lg font-semibold text-gray-800">Juan Pérez</h4>
                                        <span class="text-sm font-medium text-blue-600 bg-blue-100 px-2 py-1 rounded-full">9:00 - 10:00</span>
                                    </div>
                                    <p class="text-sm text-gray-600">Control mensual</p>
                                    <p class="text-xs text-red-600 mt-1">Alergias: Penicilina</p>
                                    <div class="mt-2 flex space-x-2">
                                        <button @click.stop="showConfirmationModal = true" class="bg-green-500 text-white px-2 py-1 rounded text-xs hover:bg-green-600 transition-colors duration-200">Iniciar consulta</button>
                                    </div>
                                </div>
                                <!-- Más citas en este horario... -->
                            </div>
                        </div>
                        
                        <!-- Otro grupo de hora -->
                        <!-- ... (similar al anterior) ... -->
                    </div>

                    <div x-show="view === 'week'" class="grid grid-cols-7 gap-4">
                        <!-- Vista semanal aquí -->
                        <div class="text-center font-semibold">Lunes</div>
                        <div class="text-center font-semibold">Martes</div>
                        <div class="text-center font-semibold">Miércoles</div>
                        <div class="text-center font-semibold">Jueves</div>
                        <div class="text-center font-semibold">Viernes</div>
                        <div class="text-center font-semibold">Sábado</div>
                        <div class="text-center font-semibold">Domingo</div>
                        <!-- Celdas para cada día... -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Detalles de la Cita -->
        <div x-show="showModal" class="fixed inset-0 bg-gray-900 bg-opacity-80 backdrop-blur-sm flex items-center justify-center z-50" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl p-8 transform transition-all duration-300 ease-in-out" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                <div class="flex justify-between items-center mb-8 border-b pb-4">
                    <h3 class="text-3xl font-extrabold text-indigo-700 tracking-tight">Detalles de la Cita</h3>
                    <button @click="showModal = false" class="text-gray-400 hover:text-gray-600 transition-colors duration-200 focus:outline-none">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="space-y-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="bg-gradient-to-br from-indigo-50 to-purple-50 p-6 rounded-xl shadow-md">
                            <h4 class="text-xl font-semibold text-indigo-800 mb-4 flex items-center">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                Información del Paciente
                            </h4>
                            <p class="mb-3"><span class="font-medium text-indigo-700">Nombre:</span> <span x-text="modalData.patient" class="text-gray-800"></span></p>
                            <p class="mb-3"><span class="font-medium text-indigo-700">Teléfono:</span> <span x-text="modalData.phone" class="text-gray-800"></span></p>
                            <p><span class="font-medium text-indigo-700">Email:</span> <span x-text="modalData.email" class="text-gray-800"></span></p>
                        </div>
                        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-6 rounded-xl shadow-md">
                            <h4 class="text-xl font-semibold text-blue-800 mb-4 flex items-center">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                Detalles de la Cita
                            </h4>
                            <p class="mb-3"><span class="font-medium text-blue-700">Fecha y Hora:</span> <span x-text="modalData.dateTime" class="text-gray-800"></span></p>
                            <p><span class="font-medium text-blue-700">Doctor:</span> <span x-text="modalData.doctor" class="text-gray-800"></span></p>
                        </div>
                    </div>
                    <div class="bg-gradient-to-br from-gray-50 to-slate-100 p-6 rounded-xl shadow-md">
                        <h4 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            Descripción
                        </h4>
                        <p x-text="modalData.description" class="text-gray-700"></p>
                    </div>
                    <div class="bg-gradient-to-br from-amber-50 to-yellow-50 p-6 rounded-xl shadow-md">
                        <h4 class="text-xl font-semibold text-amber-800 mb-4 flex items-center">
                            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                            Comentarios
                        </h4>
                        <p x-text="modalData.comment" class="text-gray-700"></p>
                    </div>
                </div>
                <div class="mt-10 flex justify-end">
                    <button @click="showModal = false" class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50 shadow-lg">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal de Confirmación -->
        <div x-show="showConfirmationModal" class="fixed inset-0 bg-gray-900 bg-opacity-80 backdrop-blur-sm flex items-center justify-center z-50" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg p-6 transform transition-all duration-300 ease-in-out" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-semibold text-red-600">Confirmar Inicio de Consulta</h3>
                    <button @click="showConfirmationModal = false" class="text-gray-400 hover:text-gray-600 transition-colors duration-200 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <p class="text-gray-700 mb-4">¿Estás seguro de que deseas iniciar la consulta para <span class="font-semibold" x-text="modalData.patient"></span>?</p>
                <div class="flex justify-end space-x-4">
                    <button @click="showConfirmationModal = false" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-400 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500">Cancelar</button>
                    <a :href="`/medico/gestionar-cita/${modalData.patient}`" class="bg-red-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-red-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-red-500">Confirmar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Notificaciones -->
    <div class="fixed bottom-4 right-4 z-50">
        <div class="bg-purple-500 text-white px-4 py-2 rounded-lg shadow-lg">
            <p class="font-semibold">Recordatorio</p>
            <p class="text-sm">Próxima cita en 15 minutos</p>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endsection
