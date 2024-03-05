<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100', 'regex:/^[^\d\W_]+(?:\s+[^\d\W_]+)*$/u'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
            'password' => ['required', 'string', 'min:8', 'max:15', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
            'dni' => ['required', 'string', 'regex:/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/i', Rule::unique('users')],
            'fecha_nacimiento' => ['required', 'date', 'before_or_equal:-18 years'],
            'telefono' => ['required', 'string', 'regex:/^(6|9)[0-9]{8}$/', Rule::unique('users')],
            'direccion' => ['required', 'string', 'max:200']
            // 'categoria_usuario_id' => ['required', 'exists:categoria_usuarios,id'],
        ];
    }
}
