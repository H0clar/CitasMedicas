@extends('medico.layouts.dashboard')

@section('title', 'Dashboard Médico')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 p-4">
    <div class="w-full max-w-4xl bg-white rounded-3xl shadow-2xl overflow-hidden transform rotate-1 -mt-16 sm:-mt-24 hover:rotate-0 transition-all duration-300">
        <div class="px-6 py-12 sm:px-12 sm:py-16">
            <div class="text-center mb-12">
                <h2 class="text-5xl sm:text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 mb-4">¡Hola, {{ auth()->user()->name }}!</h2>
                <p class="text-xl text-gray-700 max-w-2xl mx-auto">Tu plataforma de gestión médica personalizada</p>
            </div>
            
            <div class="flex flex-col sm:flex-row items-center justify-center space-y-8 sm:space-y-0 sm:space-x-12">
                <div class="w-48 h-48 bg-gradient-to-br from-indigo-400 to-pink-500 rounded-full flex items-center justify-center shadow-lg transform -rotate-6 hover:rotate-0 transition-all duration-300">
                    <svg class="w-28 h-28 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </div>
                <div class="text-center sm:text-left max-w-md">
                    <h3 class="text-3xl font-bold text-gray-800 mb-4">Potencia tu práctica médica</h3>
                    <p class="text-lg text-gray-600">Descubre todas las herramientas diseñadas para optimizar tu trabajo diario y mejorar la atención a tus pacientes.</p>
                </div>
            </div>
            
            <div class="mt-12 flex justify-center">
                <a href="#" class="px-10 py-4 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white font-bold rounded-full text-xl transition duration-300 ease-in-out hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 transform hover:-translate-y-1 hover:scale-105">
                    ¡Empezar ahora!
                </a>
            </div>
        </div>
    </div>
</div>
@endsection