<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registro extends FormRequest
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
            '_nu' => 'required|max:250',
            '_rol' => 'required',
            '_email' => 'required|email:rfc,dns|max:250',
            '_fn' => 'required',
            '_tel' => 'max:10',
            '_ap' => 'max:250',
            '_am' => 'max:250',
            '_pd' => 'required|max:250',
            '_pdc' => 'required|max:250|same:_pd',
            '_sx' => 'required',
            '_rfc' => 'max:13',
        ];
    }
    public function attributes(): array
    {
        return [
            '_nu' => 'Nombre',
            '_rol' => 'Rol',
            '_email' => 'Correo Electrónico',
            '_fn' => 'Fecha de Nacimiento',
            '_tel' => 'Teléfono',
            '_ap' => 'Apellido Paterno',
            '_am' => 'Apellido Materno',
            '_pd' => 'Contraseña',
            '_pdc' => 'Confirmación de Contraseña',
            '_sx' => 'Sexo',
            '_rfc' => 'RFC',
        ];
    }
}
