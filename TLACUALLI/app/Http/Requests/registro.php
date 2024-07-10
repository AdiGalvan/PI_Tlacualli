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
        $rules = [
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
        $this->addConditionalAddressRules($rules, '_mun', '_edo', '_col', '_cp', '_ca', '_ne', '_ni');
        $this->addConditionalAddressRules($rules, '_mun_fiscal', '_edo_fiscal', '_col_fiscal', '_cp_fiscal', '_ca_fiscal', '_ne_fiscal', '_ni_fiscal');
        return $rules;
    }

    protected function addConditionalAddressRules(&$rules, $municipio, $estado, $colonia, $cp, $calle, $numExt, $numInt)
    {
        if ($this->filled($municipio) || $this->filled($estado) || $this->filled($colonia) || $this->filled($cp) || $this->filled($calle) || $this->filled($numExt) || $this->filled($numInt)) {
            $rules[$municipio] = 'required';
            $rules[$estado] = 'required';
            $rules[$colonia] = 'required';
            $rules[$cp] = 'required';
            $rules[$calle] = 'required';
            $rules[$numExt] = 'required';
        }
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
