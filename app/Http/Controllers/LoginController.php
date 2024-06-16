<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
        // Validar los datos de registro
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Crear el nuevo usuario
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 2, // Asegúrate de que este ID existe en la tabla `roles`
        ]);
    
        // Redirigir al usuario a la página de inicio de sesión
        return redirect()->route('login.form')->with('success', 'Cuenta creada exitosamente. Por favor, inicia sesión.');
    }
    
    

    public function logout(Request $request)
    {
        // Cerrar sesión
        Session::forget('logged_in');
        return redirect()->route('login.form');
    }
}
