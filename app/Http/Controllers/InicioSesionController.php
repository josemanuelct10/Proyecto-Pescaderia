<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



use Illuminate\Http\Request;
use App\Models\User;


class InicioSesionController extends Controller
{
    public function inicio(){
        return view('InicioSesion.inicioSesion');

    }

    public function registro(){
        return view('InicioSesion.registro');

    }

    public function gestionRegistro(UsuarioRequest $request){
        User::create($request->all());
        return redirect()->route('inicio');
    }
    public function gestionInicio(Request $request)
    {
        // Obtener el usuario con el email
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            if ($user->categoria_usuario_id == 0) {
                // Si es admin, redirige a la ruta correspondiente para admin
                Auth::login($user);
                return redirect()->route('inicioAdmin'); // Cambia esto a la ruta correcta
            } else {
                // Si no es admin, redirige al inicio de sesión normal
                Auth::login($user);
                return redirect()->route('clientes.inicio');
            }
        }

        // Si no se encuentra el usuario o la contraseña no coincide,
        // redirigir de vuelta al formulario de inicio de sesión con un mensaje de error
        return redirect()->back()->withErrors(['error' => 'Credenciales incorrectas.'])->withInput($request->only('email'));
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('inicio');
    }

    public function perfil()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->categoria_usuario_id == 1) {
                // Si la categoría es 1, redirigir a la ruta correspondiente
                return view('InicioSesion.perfilUsuario', ['user'=>$user]);
            } else {
                // Si la categoría es 0, redirigir a la ruta correspondiente
                return view('InicioSesion.perfilAdmin', ['user'=>$user]);
            }
        } else {
            // Si no hay usuario autenticado, redirigir a la página de inicio de sesión
            return redirect()->route('login');
        }
    }


    public function updatePerfil(UsuarioRequest $request){
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

                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'dni' => $request->dni,
                    'fecha_nacimiento' => $request->fechaNacimiento,
                    'telefono' => $request->telefono,
                    'direccion' => $request->direccion,
                ]);

                if ($user->categoria_usuario_id == 0){
                    return redirect()->route('inicioAdmin');
                }
                else {
                    return redirect()->route('inicio');
                }
    }

    public function updatePassword(){
        return view('InicioSesion.updatePassword');
    }

    public function verificarDatos(Request $request){
        $user = User::where('email', $request->email)
        ->where('dni', $request->dni)
        ->first();

        if ($user) {
            return view('InicioSesion.cambiarContraseña')->with('user', $user);
        } else {
            return redirect()->back()->withErrors(['error' => 'Credenciales incorrectas.'])->withInput($request->only('email', 'dni'));
        }
    }

    public function actualizarPassword(Request $request){
        // Validar los datos del formulario
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Obtener el usuario autenticado
        $user = auth()->user();


        // Actualizar la contraseña del usuario
        if ($user) {
            $user->password =$request->password; // Opcionalmente puedes usar Hash::make($request->password)
            $user->save();

            // Redirigir al usuario a alguna vista de éxito
            return redirect()->route('inicio');
        } else {
            // Manejar el caso en el que el usuario no exista (esto debería ser poco probable ya que ya se ha verificado en el método 'verificarDatos')
            // return redirect()->route);
        }
    }

}
