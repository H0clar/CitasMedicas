<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Citas\CitaUserController;

// Ruta para la página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas sin protección de middleware de autenticación
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/citas', [CitaUserController::class, 'index'])->name('citas');

// Ruta para la vista de inicio después de iniciar sesión
Route::get('/home', function () {
    return view('home');
})->name('home');
