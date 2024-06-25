@extends('medico.layouts.dashboard')

@section('title', 'Gestionar Cita')

@section('content')
<div class="flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 p-4 sm:p-8 relative overflow-hidden" style="height: calc(100vh - 8rem);">
    <!-- Tarjetas de fondo mejoradas (solo visibles en pantallas grandes) -->
    <div class="absolute inset-0 hidden lg:flex items-center justify-center">
        <div class="w-full max-w-7xl relative">
            @php
                $colors = [
                    'from-blue-200 to-blue-100',
                    'from-purple-200 to-purple-100',
                    'from-pink-200 to-pink-100',
                    'from-indigo-200 to-indigo-100',
                    'from-teal-200 to-teal-100'
                ];
            @endphp

            @foreach($colors as $index => $gradient)
                <div class="absolute w-full h-96 bg-gradient-to-br {{ $gradient }} rounded-3xl shadow-lg overflow-hidden transform transition-all duration-500 ease-in-out"
                     style="top: 50%; left: 50%; transform: translate(-50%, -50%) rotate({{ $index * 10 - 20 }}deg) translateZ({{ $index * 5 }}px); width: calc(100% - {{ $index * 1.5 }}rem);">
                    <div class="absolute inset-0 opacity-30 mix-blend-overlay">
                        <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                            @for ($i = 0; $i < 8; $i++)
                                <circle cx="{{ rand(0, 100) }}" cy="{{ rand(0, 100) }}" r="{{ rand(5, 25) }}" fill="rgba(255,255,255,0.1)"/>
                            @endfor
                        </svg>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Tarjeta frontal principal -->
    <div class="relative w-full max-w-full bg-white/80 backdrop-blur-xl rounded-3xl shadow-xl overflow-hidden z-10 mx-4 sm:mx-0 p-6 sm:p-12">
        <div class="text-center mb-6 sm:mb-10">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2 sm:mb-4">Gestionar Cita</h2>
            <p class="text-gray-600">{{ $cita['patient'] }} - {{ $cita['dateTime'] }}</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Información del paciente -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-md p-4 border border-gray-200">
                    <h3 class="text-lg font-semibold mb-2 text-gray-800 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Información del Paciente
                    </h3>
                    <div class="space-y-2">
                        <p class="flex justify-between text-sm"><span class="font-medium text-gray-500">Nombre:</span> <span class="text-gray-800">{{ $cita['patient'] }}</span></p>
                        <p class="flex justify-between text-sm"><span class="font-medium text-gray-500">Fecha y Hora:</span> <span class="text-gray-800">{{ $cita['dateTime'] }}</span></p>
                        <p class="flex justify-between text-sm"><span class="font-medium text-gray-500">Doctor:</span> <span class="text-gray-800">{{ $cita['doctor'] }}</span></p>
                        <p class="flex justify-between text-sm"><span class="font-medium text-gray-500">Teléfono:</span> <span class="text-gray-800">{{ $cita['phone'] }}</span></p>
                        <p class="flex justify-between text-sm"><span class="font-medium text-gray-500">Email:</span> <span class="text-gray-800">{{ $cita['email'] }}</span></p>
                        <div class="pt-2">
                            <p class="font-medium text-gray-500 text-sm mb-1">Comentarios:</p>
                            <p class="text-gray-800 text-sm bg-gray-50 p-2 rounded">{{ $cita['comment'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Formulario para agregar nueva información -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-md p-4 border border-gray-200">
                    <h3 class="text-lg font-semibold mb-2 text-gray-800 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Agregar Información
                    </h3>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="diagnostico" class="block text-sm font-medium text-gray-700 mb-1">Diagnóstico</label>
                            <textarea id="diagnostico" name="diagnostico" rows="3" class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ingrese el diagnóstico..."></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="indicaciones" class="block text-sm font-medium text-gray-700 mb-1">Indicaciones</label>
                            <div class="flex items-center justify-center w-full">
                                <label for="indicaciones" class="flex flex-col items-center justify-center w-full h-24 border-2 border-blue-300 border-dashed rounded-lg cursor-pointer bg-blue-50 hover:bg-blue-100 transition duration-300 ease-in-out">
                                    <div class="flex flex-col items-center justify-center pt-4 pb-4">
                                        <svg class="w-8 h-8 mb-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                        <p class="mb-1 text-sm text-blue-500"><span class="font-semibold">Clic para subir</span> o arrastrar y soltar</p>
                                        <p class="text-xs text-blue-500">PDF, DOC, DOCX (MAX. 10MB)</p>
                                    </div>
                                    <input id="indicaciones" name="indicaciones" type="file" class="hidden" />
                                </label>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="receta" class="block text-sm font-medium text-gray-700 mb-1">Receta Médica</label>
                            <div class="flex items-center justify-center w-full">
                                <label for="receta" class="flex flex-col items-center justify-center w-full h-24 border-2 border-blue-300 border-dashed rounded-lg cursor-pointer bg-blue-50 hover:bg-blue-100 transition duration-300 ease-in-out">
                                    <div class="flex flex-col items-center justify-center pt-4 pb-4">
                                        <svg class="w-8 h-8 mb-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                        <p class="mb-1 text-sm text-blue-500"><span class="font-semibold">Clic para subir</span> o arrastrar y soltar</p>
                                        <p class="text-xs text-blue-500">PDF, DOC, DOCX (MAX. 10MB)</p>
                                    </div>
                                    <input id="receta" name="receta" type="file" class="hidden" />
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                            Guardar Información
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Información detallada de la cita -->
        <div class="mt-6">
            <h3 class="text-lg font-semibold mb-2 text-gray-800 flex items-center">
                <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Información Detallada de la Cita
            </h3>
            <div class="bg-white p-4 rounded-xl shadow-md border border-gray-200">
                <p class="text-gray-600">No hay información detallada disponible.</p>
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
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const fileInputs = document.querySelectorAll('input[type="file"]');
        fileInputs.forEach(input => {
            input.addEventListener('change', (e) => {
                const fileName = e.target.files[0]?.name;
                const label = e.target.closest('label');
                const textElement = label.querySelector('p:first-of-type');
                if (fileName) {
                    textElement.textContent = `Archivo seleccionado: ${fileName}`;
                }
            });
        });
    });
</script>
@endpush
