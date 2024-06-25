@extends('medico.layouts.dashboard')
@section('title', 'Dashboard Médico')
@section('content')
<div class="flex items-center justify-center bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 p-4 sm:p-8 relative overflow-hidden" style="height: calc(100vh - 8rem);">
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
    <div class="relative w-full max-w-3xl bg-white/80 backdrop-blur-xl rounded-3xl shadow-xl overflow-hidden z-10 mx-4 sm:mx-0 p-6 sm:p-12">
        <div class="text-center mb-6 sm:mb-10">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-800 mb-2 sm:mb-4">Bienvenido, Dr. {{ auth()->user()->name }}</h2>
            <p class="text-lg sm:text-xl text-gray-600 max-w-2xl mx-auto">Su plataforma personal de gestión de citas médicas</p>
        </div>
        
        <div class="flex flex-col sm:flex-row items-center justify-center space-y-6 sm:space-y-0 sm:space-x-12">
            <div class="w-32 h-32 sm:w-40 sm:h-40 bg-gradient-to-br from-blue-300 to-purple-300 rounded-full flex items-center justify-center shadow-lg transform transition-all duration-300 hover:scale-110">
                <svg class="w-16 h-16 sm:w-20 sm:h-20 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div class="text-center sm:text-left max-w-md">
                <h3 class="text-xl sm:text-2xl font-bold text-gray-700 mb-2 sm:mb-4">Gestione sus citas con facilidad</h3>
                <p class="text-md text-gray-600">Optimice su agenda, mejore la atención al paciente y aumente la eficiencia de su práctica médica.</p>
            </div>
        </div>
        
        <div class="mt-8 sm:mt-12 flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
            <a href="#" class="px-6 py-3 bg-gradient-to-r from-blue-400 to-purple-400 text-white font-semibold rounded-full text-lg transition duration-300 ease-in-out hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-opacity-50 transform hover:-translate-y-1 hover:scale-105">
                Ver Citas de Hoy
            </a>
            <a href="#" class="px-6 py-3 bg-white text-purple-500 font-semibold rounded-full text-lg transition duration-300 ease-in-out hover:bg-purple-50 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-opacity-50 transform hover:-translate-y-1 hover:scale-105">
                Agenda Semanal
            </a>
        </div>
    </div>
</div>
@endsection
