<?php

// web.php
// web.php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\citas\CitauserController;
use App\Http\Controllers\medico\HomeMedicoController;
use App\Http\Controllers\medico\AgendaMedicoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [LoginController::class, 'register'])->name('register.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/citas', [CitauserController::class, 'index'])->name('citas.index');
    Route::post('/citas', [CitauserController::class, 'store'])->name('citas.store');
    Route::get('/citas/list', [CitauserController::class, 'list'])->name('citas.list');
    Route::get('/medicos/{medico}/horarios', [CitauserController::class, 'getHorarios'])->name('medicos.horarios');
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::get('/medico/dashboard', [HomeMedicoController::class, 'home'])->name('medico.home');
    
    // Ruta para generar enlaces firmados
    Route::get('/generate-link', function () {
        $url = URL::signedRoute('medico.dashboard');
        return $url;
    })->name('generate.link');
});






Route::get('/medico/agenda', [AgendaMedicoController::class, 'index'])->name('medico.agenda');
