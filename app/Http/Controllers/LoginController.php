<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('log.login');
    }

    public function login(Request $request)
    {
        // Validar credenciales
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Credenciales fijas
        $validEmail = 'admin@admin.cl';
        $validPassword = '12345';

        // Comprobar las credenciales
        if ($request->email === $validEmail && $request->password === $validPassword) {
            // Iniciar sesión (puedes implementar la lógica que necesites aquí)
            Session::put('logged_in', true);
            return redirect()->route('home'); // Redirigir al dashboard
        } else {
            return back()->withErrors([
                'email' => 'Las credenciales no coinciden con nuestros registros.',
            ]);
        }
    }

    public function showRegisterForm()
    {
        return view('log.register'); // Asegúrate de tener esta vista
    }

    public function register(Request $request)
    {
        // Lógica para registrar al usuario
    }

    public function logout(Request $request)
    {
        // Cerrar sesión
        Session::forget('logged_in');
        return redirect()->route('login.form');
    }
}
