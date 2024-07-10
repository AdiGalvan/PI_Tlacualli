<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validadorFormServicios extends FormRequest
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
            //reglas para el formulario de servicios
            'nombre' => 'required',
            'proveedor' => 'required',
            't_servicio'=>'required',
            'descripcion' => 'required | max: 255',
            'fecha' => 'required|date'
        ];
    }

    public function attributes(): array{
        return[
            'nombre' => '"Nombre"',
            'proveedor' => '"Proveedor"',
            't_servicio' => '"Tipo de servicio"',
            'descripcion' => '"Descripción"',
            'fecha' => '"Fecha"',
        ];
    }
}
