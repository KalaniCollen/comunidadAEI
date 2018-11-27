<?php

namespace ComunidadAEI\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CuentaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'apellido_paterno' => 'required|string',
            'apellido_materno' => 'required|string',
            'telefono_movil'  => 'nullable|regex:/(55)[0-9]{8}/',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'No puedes dejar este campo vacio',
            'apellido_paterno' => 'No puedes dejar este campo vacio',
            'apellido_materno' => 'No puedes dejar este campo vacio',
            'telefono_movil.regex' => 'Introduce un telefono de 10 digitos'
        ];
    }
}
