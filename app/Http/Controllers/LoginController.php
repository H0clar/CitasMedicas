<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

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

        // Verificar si el usuario existe en la base de datos
        $user = User::where('email', $request->email)->first();

        if ($user) {
            \Log::info('Usuario encontrado: ' . $request->email);
            \Log::info('Contraseña en DB: ' . $user->password);
            if (Hash::check($request->password, $user->password)) {
                // Autenticar al usuario manualmente
                Auth::login($user);
                // Autenticación exitosa, redirigir según el rol
                return $this->redirectUserBasedOnRole($user);
            } else {
                \Log::info('Contraseña incorrecta para el usuario: ' . $request->email);
            }
        } else {
            \Log::info('Usuario no encontrado: ' . $request->email);
        }

        // Credenciales incorrectas, volver a la página de login con un error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    protected function redirectUserBasedOnRole($user)
    {
        switch ($user->role_id) {
            case 1:
                // Redirigir al dashboard general
                return redirect()->route('home');
            case 2:
                // Redirigir al dashboard de usuarios
                return redirect()->route('dashboard');
            case 3:
                // Redirigir al dashboard de médicos
                return redirect()->route('medico.home'); // Ruta corregida
            default:
                // Redirigir a una página por defecto si el rol no es reconocido
                return redirect()->route('home');
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
            'password' => $request->password, // La mutación en el modelo se encargará de hashear la contraseña
            'role_id' => 2, // Asegúrate de que este ID existe en la tabla `roles`
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ]);

        // Redirigir al usuario a la página de inicio de sesión
        return redirect()->route('login')->with('success', 'Cuenta creada exitosamente. Por favor, inicia sesión.');
    }

    public function logout(Request $request)
    {
        // Cerrar sesión
        Auth::logout();
        return redirect()->route('login'); // Asegúrate de que este nombre de ruta sea 'login'
    }
}
