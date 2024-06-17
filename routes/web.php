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
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); // Asegúrate de que esta ruta tenga el nombre 'login'
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [LoginController::class, 'register'])->name('register.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas protegidas por middleware de autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/citas', [CitaUserController::class, 'index'])->name('citas');
    Route::post('/citas', [CitaUserController::class, 'store'])->name('citas.store');
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    
    // Ruta para obtener los horarios disponibles del médico seleccionado
    Route::get('medicos/{medico}/horarios', [CitaUserController::class, 'getHorarios'])->name('medicos.horarios');
});
