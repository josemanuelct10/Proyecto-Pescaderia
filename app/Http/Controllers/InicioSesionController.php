<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class InicioSesionController extends Controller
{
    // Método para mostrar la vista de inicio de sesión
    public function inicio()
    {
        return view('InicioSesion.inicioSesion');
    }

    // Método para mostrar la vista de registro
    public function registro()
    {
        return view('InicioSesion.registro');
    }

    // Método para gestionar el registro de un nuevo usuario
    public function gestionRegistro(UsuarioRequest $request)
    {
        // Crear un nuevo usuario con los datos del formulario
        User::create($request->all());

        // Redirigir a la ruta de inicio
        return redirect()->route('inicio');
    }

    // Método para gestionar el inicio de sesión
    public function gestionInicio(Request $request)
    {
        // Obtener el usuario con el email proporcionado
        $user = User::where('email', $request->email)->first();

        // Verificar si el usuario existe y si la contraseña coincide
        if ($user && Hash::check($request->password, $user->password)) {
            // Verificar el rol del usuario
            if ($user->categoriaUsuario->descripcion === "Administrador") {
                // Si es administrador, redirigir a la ruta correspondiente para administradores
                Auth::login($user);
                return redirect()->route('inicioAdmin');
            } else {
                // Si no es administrador, redirigir al inicio de sesión normal para clientes
                Auth::login($user);
                return redirect()->route('clientes.inicio');
            }
        }

        // Si no se encuentra el usuario o la contraseña no coincide,
        // redirigir al formulario de inicio de sesión con un mensaje de error
        return redirect()->back()->withErrors(['error' => 'Credenciales incorrectas.'])->withInput($request->only('email'));
    }

    // Método para cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('inicio');
    }

    // Método para mostrar el perfil del usuario
    public function perfil()
    {
        // Verificar si hay un usuario autenticado
        if (Auth::check()) {
            $user = Auth::user();

            // Verificar el rol del usuario
            if ($user->categoriaUsuario->descripcion === "Administrador") {
                // Si el usuario es administrador, mostrar el perfil de administrador
                return view('InicioSesion.perfilAdmin', ['user' => $user]);
            } else {
                // Si el usuario no es administrador, mostrar el perfil de usuario
                return view('InicioSesion.perfilUsuario', ['user' => $user]);
            }
        } else {
            // Si no hay usuario autenticado, redirigir al inicio de sesión
            return redirect()->route('login');
        }
    }

    // Método para actualizar el perfil del usuario
    public function updatePerfil(UsuarioRequest $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'dni' => 'required|string|max:255',
            'fechaNacimiento' => 'required|date',
            'telefono' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
        ]);

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Actualizar los datos del usuario con los datos del formulario
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'dni' => $request->dni,
            'fecha_nacimiento' => $request->fechaNacimiento,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
        ]);

        // Redirigir a la ruta correspondiente según el rol del usuario
        if ($user->categoriaUsuario->descripcion === "Administrador") {
            return redirect()->route('inicioAdmin');
        } else {
            return redirect()->route('inicio');
        }
    }
}
