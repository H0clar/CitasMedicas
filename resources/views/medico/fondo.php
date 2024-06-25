@extends('medico.layouts.dashboard')
@section('title', 'Dashboard Médico')
@section('content')
<div class="flex items-center justify-center bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 p-8 relative overflow-hidden" style="height: calc(100vh - 8rem);">
    <!-- Tarjetas de fondo mejoradas -->
    <div class="absolute inset-0 flex items-center justify-center">
        <div class="w-full max-w-7xl relative">
            <!-- Tarjetas traseras -->
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
</div>
@endsection
