<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\citas\CitaUserController;

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
    Route::get('/citas', [CitaUserController::class, 'index'])->name('citas');
    Route::post('/citas', [CitaUserController::class, 'store'])->name('citas.store');
    Route::get('/citas/list', [CitaUserController::class, 'list'])->name('citas.index');
    Route::get('/medicos/{medico}/horarios', [CitaUserController::class, 'getHorarios'])->name('medicos.horarios');
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});
