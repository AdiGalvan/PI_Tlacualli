<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
<<<<<<< Updated upstream
    public function rules(): array
    {
        return [
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'costo' => 'required',
            'stock' => 'required',
=======
    public function rules()
    {
        return [
            'producto' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'costo' => 'required|numeric',
            'proveedor' => 'required|integer',
            'estatus' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'producto.required' => 'El nombre del producto es obligatorio.',
            'descripciom.required' => 'El nombre del producto es obligatorio.',
            'costo.required' => 'El costo del producto es obligatorio.',
            'proveedor.required' => 'El stock del producto es obligatorio.',
>>>>>>> Stashed changes
        ];
    }
}
