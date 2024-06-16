<!-- resources/views/home.blade.php -->
@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen flex items-start justify-center bg-gradient-to-br from-purple-100 via-pink-100 to-yellow-100 text-gray-800">
    <div class="mt-10 p-6 sm:p-12 rounded-2xl shadow-2xl w-full max-w-4xl bg-white border border-gray-200">
        <div class="text-center">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 sm:mb-6 text-purple-700">¡Bienvenido al Dashboard de HealthConnect!</h2>
            <p class="text-lg sm:text-xl md:text-2xl mb-4 sm:mb-8 text-gray-700">Tu centro para gestionar citas médicas de manera eficiente y sencilla.</p>
        </div>
        <div class="flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-8 mt-8">
            <img src="/images/welcome-image.png" alt="Welcome" class="w-24 h-24 sm:w-32 sm:h-32 rounded-full shadow-lg border border-gray-300">
            <div class="text-center md:text-left">
                <h3 class="text-2xl sm:text-3xl font-semibold text-purple-700">Estamos aquí para ayudarte</h3>
                <p class="mt-4 text-lg sm:text-xl text-gray-700">Accede a todas las herramientas y funcionalidades que necesitas para una gestión médica efectiva.</p>
            </div>
        </div>
    </div>
</div>
@endsection
