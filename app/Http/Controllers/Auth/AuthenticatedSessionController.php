<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validar las credenciales de entrada con mensajes personalizados
        $credentials = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ], [
            'email.exists' => 'El email ingresado no existe en nuestros registros.',
            'email.required' => 'El campo email es obligatorio.',
            'email.email' => 'Debes ingresar un email válido.',
            'password.required' => 'El campo contraseña es obligatorio.',
        ]);

        // Obtener el usuario por el email
        $user = User::where('email', $credentials['email'])->first();

        // Comparar la contraseña cifrada usando Hash::check
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Iniciar sesión manualmente
            Auth::login($user);

            // Regenerar la sesión para evitar ataques de fijación de sesión
            $request->session()->regenerate();

            // Redirigir al usuario a la página de inicio
            return redirect()->intended('/inicio');
        }

        // Si las credenciales no son correctas, redirigir de vuelta con un mensaje de error
        return back()->withErrors([
            'email' => 'La contraseña no coincide con este usuario.',
        ])->onlyInput('email');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
